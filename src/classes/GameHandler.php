<?php
namespace src\classes;

use src\classes\Deck;
use src\classes\Player;
use src\classes\Bank;
use src\classes\Console;

class GameHandler {

  private $handler;
  private $playerNumber;
  private $deck;
  private $playersList = [];
  private $bank;
  private $console;

  function __construct() {
    $this->handler = fopen("php://stdin", "r");
    $this->deck = new Deck;
    $this->console = new Console;
    $this->bank = new Bank($this->deck);

    $this->gameSetup(false);
  }

  private function gameSetup() {
    $this->console->clear();
    $clientNumber = $this->console->ask('Combien de joueurs y a-t-il ?', [1, 2, 3, 4, 5]);
    
    echo 'Il y a ' . $clientNumber . ' joueur(s)';

    $this->playerNumber = $clientNumber;
    $this->createPlayers();
  }

  private function createPlayers() {
    $this->console->clear();
    for ($i = 1; $i <= $this->playerNumber; $i++) {
      $this->console->clear();
      $clientName = $this->console->askFree("Nom du joueur " . $i . " : ");

      array_push($this->playersList, new Player($clientName, 500, $this->deck));
    }

    $this->firstTurn();
  }

  private function firstTurn() {
    $this->console->clear();
    foreach ($this->playersList as $player) {
      $player->draw();
      $player->draw();
    }

    $this->bank->draw();

    $this->regularTurn();
  }

  private function gambleTime() {
    foreach ($this->playersList as $player) {
      $clientBet = $this->console->askFree("Quelle est ta mise " . $player->getName() . "?");
      $player->addGamble($clientBet);
    }
  }

  private function showInfos($playerObject) {
    $this->console->clear();
    echo "Banque : ";
    $this->console->showCards($this->bank->getHand());
    echo "Joueur : " . $playerObject->getName() . "\n\r";
    $this->console->showCards($playerObject->getHand());
    return $this->console->ask("Piocher une autre carte ?", ["O","N"]);
  }

  private function regularTurn() {
  
    foreach ($this->playersList as $player) {
      $clientChoice = $this->showInfos($player);
      
      while ($clientChoice === 'O') {
        $player->draw();
        $clientChoice = $this->showInfos($player);
      }
    }
  }
}