<?php
namespace src\classes;

use src\interfaces\EntityInterface;

class Entity implements EntityInterface {
  protected $hand = [];
  protected $deck;

  function __construct($deck) {
    $this->deck = $deck;
  }

  public function draw() {
    array_push($this->hand, $this->deck->pick());
  }
  
  public function getHand() {
    return $this->hand;
  }
}