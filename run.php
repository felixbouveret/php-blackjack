<?php

use src\classes\GameHandler;

// REQUIRES
require_once 'vendor/autoload.php';
require_once 'params.php';

// echo 'Tu veux ' . $consoleHandler->ask('Combien denfant tu veux ?', [1, 2, 3, 4]) . ' enfant(s)';

$gameHandler = new GameHandler();
