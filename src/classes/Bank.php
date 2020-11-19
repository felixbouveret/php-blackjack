<?php
namespace src\classes;

use src\classes\Player;

class Bank extends Player {
  function __construct() {
    
  } 

  public function draw($card) {
    $handLength = count($this->hand);
    $newCard = [
      "card" => $card,
      "isVisible" => true
    ];
    
    if($handLength === 1) {
      $newCard["isVisible"] = false;
    }
    
    array_push($this->hand, $newCard);
  }
}