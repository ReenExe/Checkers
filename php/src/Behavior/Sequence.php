<?php

namespace ReenExe\TicTac\Behavior;

use ReenExe\TicTac\Answer\Factory;
use ReenExe\TicTac\Behavior;
use ReenExe\TicTac\Game;

class Sequence extends Behavior
{
    public function getNext()
    {
        $queue = $this->getRestQueue();
        $position = current($queue);
        $this->put($position);

        if (Game::getWinner($this->desc->toMap())) {
            return Factory::createWinner($this->player, $position);
        }

        return Factory::createPosition($position);
    }
}
