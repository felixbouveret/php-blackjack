<?php

namespace src\interfaces;

interface Entity {
  public function draw($card);
  public function skip();
  public function getHand();
}
