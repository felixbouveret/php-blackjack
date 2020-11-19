<?php

namespace src\classes;

class Console
{
    const BREAK_LINE = "\n\r";
    private $handler;


    function __construct()
    {
        $this->handler = fopen("php://stdin", "r");
    }

    public function clear()
    {
        strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? system('cls') : system('clear');
    }

    public function separator()
    {
        echo self::BREAK_LINE . "--------------------------------------" . self::BREAK_LINE;
    }

    public function ask(string $message, array $responses): string
    {
        $parenthesis = '(';

        foreach ($responses as $index => $response) {
            if (count($responses) === ($index + 1)) {
                $parenthesis .= $response;
                break;
            }
            $parenthesis .= $response . ',';
        }
        $parenthesis .= ')';

        echo $message . ' ' . $parenthesis . ' ? :' . self::BREAK_LINE;
        $userResponse = trim(fgets($this->handler));

        if (in_array($userResponse, $responses)) {
            return $userResponse;
        }

        echo "Vous devez repondre avec les paramètre entre parenthèse ! $parenthesis " . self::BREAK_LINE;
        return $this->ask($message, $responses);
    }

    public function askFree(string $message): string
    {
        echo $message . self::BREAK_LINE;
        $userResponse = htmlentities(trim(fgets($this->handler)));
        return $userResponse;
    }

    public function askBet(string $message): int
    {
        echo $message . self::BREAK_LINE;
        $userResponse = trim(fgets($this->handler));
        if (is_numeric($userResponse)) {
            $userResponse = intval($userResponse);
            return $userResponse;
        }

        echo "La valeur donnée doit être numérique !";
        return $this->askBet($message);
    }

    public function showCards(array $cards)
    {
        $rtr = "";

        $arrayTypeSign = [
            "Coeur" => "♥️",
            "Carreaux" => "♦️",
            "Pique" => "♠️",
            "Trèffle" => "♣️"
        ];

        foreach ($cards as $card) {
            $sign = $arrayTypeSign[$card->getType()];
            $rtr .= $card->getName() . " " . $sign;
            $rtr .= " | ";
        }

        echo $rtr . self::BREAK_LINE;
    }
}