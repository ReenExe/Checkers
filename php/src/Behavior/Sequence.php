<?php

namespace ReenExe\TicTac\Behavior;

use ReenExe\TicTac\Answer\Factory;
use ReenExe\TicTac\Behavior;
use ReenExe\TicTac\Game;

class Sequence extends Behavior
{
    //     0 1 2
    //     3 4 5
    //     6 7 8
    private $queue = [4, 1, 2, 5, 8, 7, 6, 3, 0];

    public function getNext()
    {
        $queue = array_diff($this->queue, array_keys($this->desc->toArray()));

        $descMap = $this->desc->toMap();

        foreach ($queue as $position) {
            $desc = $descMap;
            $desc[$position] = $this->player;

            if (Game::getWinner($desc)) {
                $this->put($position);
                return Factory::createWinner($this->player, $position);
            }
        }

        foreach ($queue as $position) {
            $desc = $descMap;
            $desc[$position] = $this->player->other();

            if (Game::getWinner($desc)) {
                $this->put($position);
                return Factory::createPosition($position);
            }
        }

        reset($queue);
        $position = current($queue);
        $this->put($position);
        return Factory::createPosition(current($queue));
    }
}