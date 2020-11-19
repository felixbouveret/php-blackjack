<?php
namespace src\classes;

use src\classes\Entity;

class Player extends Entity {
  private $money;
  private $gamble;
  private $playerName;

  function __construct($name, $money, $deck) {
    $this->playerName = $name;
    $this->money= $money;
    $this->deck= $deck;
  }

  public function addGamble($amount) {
    if($amount > $this->money) {
      return false;
    }
    $this->money -= $amount;
    $this->gamble = $amount;

    return true;
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