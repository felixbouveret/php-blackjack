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
}