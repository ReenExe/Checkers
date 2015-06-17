<?php

namespace ReenExe\TicTac\Answer;

use ReenExe\TicTac\Answer;
use ReenExe\TicTac\Choice;

class Winner extends Answer
{
    public function __construct(Choice $choice = null, $position)
    {
        $this->winner = $choice;
        $this->position = $position;
        $this->finish = true;
    }
}