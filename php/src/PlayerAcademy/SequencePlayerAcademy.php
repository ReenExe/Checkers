<?php

namespace ReenExe\TicTac\PlayerAcademy;

use ReenExe\TicTac\Behavior\SequenceBehaviorFactory;
use ReenExe\TicTac\Behavior\StrategyBehaviorFactory;
use ReenExe\TicTac\PlayerAcademy;

class SequencePlayerAcademy extends PlayerAcademy
{
    protected function getBehaviorFactory()
    {
        return new SequenceBehaviorFactory();
    }
}