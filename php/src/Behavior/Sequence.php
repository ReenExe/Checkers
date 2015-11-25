<?php

namespace ReenExe\TicTac\Behavior;

use ReenExe\TicTac\Behavior;

class Sequence extends Behavior
{
    public function getNext()
    {
        return $this->getFirst($this->getRestQueue());
    }
}
