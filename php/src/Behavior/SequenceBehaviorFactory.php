<?php

namespace ReenExe\TicTac\Behavior;

use ReenExe\TicTac\Desk;
use ReenExe\TicTac\Choice;

class SequenceBehaviorFactory implements BehaviorFactoryInterface
{
    public function create(Desk $desc, Choice $player)
    {
        return new Sequence($desc, $player);
    }
}