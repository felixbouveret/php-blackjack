<?php
namespace src\classes;

use src\interfaces\Entity;

class Player implements Entity {
  protected $hand = [];
  private $money;
  private $gamble;
  private $playerName;
  private $deck;

  function __construct($name, $money, $deck) {
    $this->playerName = $name;
    $this->money= $money;
    $this->deck= $deck;
  }

  public function draw() {
    array_push($this->hand, $this->deck->pick());
  }
  
  public function skip() {
    echo('skip');
  }
  
  public function getHand() {
    return $this->hand;
  }

  public function addGamble($amount) {
    if($this->money < $amount) {
      return "Vous n'avez pas assez d'argent !";
    }
    $this->money -= $amount;
    $this->gamble = $amount;
  }
  
  public function getGamble() {
    return $this->gamble;
  }

  public function roundEnd($resultType) {
    switch ($resultType) {
      case 'win':
        $this->money += $this->gamble * 2;
        break;
        
      case 'tie':
        $this->money += $this->gamble;
        break;
      
      default:
        break;
    }
    $this->gamble = 0;
  }

  public function setMoney($amount) {
    $this->money = $amount;
  }

  public function getMoney() {
    return $this->money;
  }

  public function getName() {
    return $this->playerName;
  }
}