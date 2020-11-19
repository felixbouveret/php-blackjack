<?php

use src\classes\Deck;
use src\classes\Console;

// REQUIRES
require_once 'vendor/autoload.php';

$consoleHandler = new Console;
echo 'Tu veux ' . $consoleHandler->ask('Combien denfant tu veux ?', [1, 2, 3, 4]) . ' enfant(s)';