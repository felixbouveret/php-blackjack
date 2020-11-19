<?php
namespace src\classes;

use src\classes\Player;

class Bank extends Player {
  function __construct($deck) {
    $this->deck= $deck;
  } 

  public function draw() {
    $handLength = count($this->hand);
    $newCard = [
      "card" => $this->deck->pick(),
      "isVisible" => true
    ];
    
    if($handLength === 1) {
      $newCard["isVisible"] = false;
    }
    
    array_push($this->hand, $newCard);
  }
}