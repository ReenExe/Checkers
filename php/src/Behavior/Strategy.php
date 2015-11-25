<?php

namespace ReenExe\TicTac\Behavior;

use ReenExe\TicTac\Answer\Factory;
use ReenExe\TicTac\Behavior;
use ReenExe\TicTac\Game;

class Strategy extends Behavior
{
    public function getNext()
    {
        $queue = $this->getRestQueue();

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

        return $this->getFirst($queue);
    }


    private function getFirst(array $queue)
    {
        $position = current($queue);
        $this->put($position);
        return Factory::createPosition($position);
    }
}