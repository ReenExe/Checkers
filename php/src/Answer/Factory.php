<?php

namespace ReenExe\TicTac\Answer;

use ReenExe\TicTac\Choice;

class Factory
{
    public static function createWinner(Choice $choice = null, $position = false)
    {
        return new Winner($choice, $position);
    }

    public static function createPosition($position)
    {
        return new Position($position);
    }
}