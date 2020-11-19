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
    $this->bank = new Bank;

    $this->gameSetup(false);
  }

  private function gameSetup() {
    $clientNumber = $this->console->ask('Combien de joueurs y a-t-il ?', [1, 2, 3, 4, 5]);
    
    echo 'Il y a ' . $clientNumber . ' joueur(s)';

    $this->playerNumber = $clientNumber;
    $this->createPlayers();
  }

  private function createPlayers() {
    for ($i = 1; $i <= $this->playerNumber; $i++) {
      echo "Nom du joueur " . $i . " : ";
      $clientName = fgets($this->handler);

      array_push($this->playersList, new Player($clientName, 500));
    }

  }
}