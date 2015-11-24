<?php

namespace ReenExe\TicTac\Behavior;

use ReenExe\TicTac\Answer\Factory;
use ReenExe\TicTac\Behavior;
use ReenExe\TicTac\Game;

class Strategy extends Behavior
{
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
        return Factory::createPosition($position);
    }
}