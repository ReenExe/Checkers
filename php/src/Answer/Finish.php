<?php

namespace ReenExe\TicTac\Answer;

use ReenExe\TicTac\Answer;
use ReenExe\TicTac\Choice;

class Finish extends Answer
{
    public function __construct(Choice $winner = null)
    {
        $this->winner = $winner;
        $this->finish = true;
    }
}