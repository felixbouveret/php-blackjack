<?php

namespace src\classes;

class Card
{
    const CARDS_VALUES = [
        ["As" => 1],
        ["2" => 2],
        ["3" => 3],
        ["4" => 4],
        ["5" => 5],
        ["6" => 6],
        ["7" => 7],
        ["8" => 8],
        ["9" => 9],
        ["10" => 10],
        ["Valet" => 10],
        ["Dame" => 10],
        ["Roi" => 10]
    ];

    private $name;
    private $value;
    private $type;

    function __construct($type, $value)
    {
        $this->name = array_key_first(self::CARDS_VALUES[$value]);
        $this->value = array_values(self::CARDS_VALUES[$value])[0];
        $this->type = $type;
    }

    public function printName()
    {
        echo "$this->name de $this->type";
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }
}