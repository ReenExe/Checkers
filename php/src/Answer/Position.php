<?php

namespace ReenExe\TicTac\Answer;

use ReenExe\TicTac\Answer;

class Position extends Answer
{
    public function __construct($position)
    {
        $this->position = $position;
        $this->finish = false;
    }
}