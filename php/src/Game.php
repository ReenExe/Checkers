<?php

namespace ReenExe\TicTac;

class Game
{
    public static function getWinner(array $desc)
    {
        static $combination = [
            [0, 1, 2],
            [3, 4, 5],
            [6, 7, 8],

            [0, 3, 6],
            [1, 4, 7],
            [6, 7, 8],

            [0, 4, 8],
            [2, 4, 6],
        ];

        foreach ($combination as $line) {
            if ($desc[$line[0]] === $desc[$line[1]] && $desc[$line[1]] === $desc[$line[2]]) {
                return $desc[$line[1]];
            }
        }
    }
}