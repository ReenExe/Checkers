<?php

namespace ReenExe\TicTac\Behavior;

use ReenExe\TicTac\Desk;
use ReenExe\TicTac\Choice;

class StrategyBehaviorFactory implements BehaviorFactoryInterface
{
    public function create(Desk $desc, Choice $player)
    {
        return new Strategy($desc, $player);
    }
}