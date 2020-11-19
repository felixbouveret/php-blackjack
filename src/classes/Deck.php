<?php

namespace src\classes;

use src\classes\Card;

class Deck
{
    function __construct()
    {
        $this->build();
    }

    const TYPES_OF_CARDS = [
        "Coeur",
        "Carreaux",
        "Pique",
        "Trèffle"
    ];

    private $cards = [];
    private $trash = [];

    private function build()
    {
        foreach (self::TYPES_OF_CARDS as $type) {
            for ($value = 0; $value < 13; $value++) {
                array_push($this->cards, new Card($type, $value));
            }
        }
    }

    private function isCardsEmpty()
    {
        if (count($this->cards) === 0) {
            return true;
        }
        return false;
    }

    public function printCards()
    {
        foreach ($this->cards as $card) {
            $card->printName();
        }
    }
    public function printTrash()
    {
        foreach ($this->trash as $trash) {
            $trash->printName();
        }
    }

    public function shuffle()
    {
        shuffle($this->cards);
    }

    public function pick()
    {
        if ($this->isCardsEmpty()) {
            return false;
        }
        $cardPicked = array_shift($this->cards);
        array_push($this->trash, $cardPicked);
        return $cardPicked;
    }
}