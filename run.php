<?php

use src\classes\Cards;

// REQUIRES
require_once 'vendor/autoload.php';

$cards = new Cards;
$cards->shuffle();
$cards->pick()->printName();
$cards->pick()->printName();
$cards->pick()->printName();
$cards->pick()->printName();
$cards->pick()->printName();
$cards->pick()->printName();
$cards->printTrash();