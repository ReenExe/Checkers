<?php

use ReenExe\TicTac\Choice;
use ReenExe\TicTac\PlayerAcademy\StrategyPlayerAcademy;

class StrategyPlayerBehaviorTest extends AbstractPlayerBehaviorTest
{
    public function gameProvider()
    {
        return [
            [
                Choice::instance(Choice::CROSS), Choice::instance(Choice::CROSS), [1, 7],
            ],
            [
                Choice::instance(Choice::ZERO), Choice::instance(Choice::CROSS), [4, 2, 5, 3],
            ],
        ];
    }

    protected function getAcademy()
    {
        return new StrategyPlayerAcademy();
    }
}