<?php

namespace ReenExe\TicTac\PlayerAcademy;

use ReenExe\TicTac\Behavior\StrategyBehaviorFactory;
use ReenExe\TicTac\PlayerAcademy;

class StrategyPlayerAcademy extends PlayerAcademy
{
    protected function getBehaviorFactory()
    {
        return new StrategyBehaviorFactory();
    }
}