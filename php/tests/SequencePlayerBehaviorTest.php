<?php

use ReenExe\TicTac\Choice;
use ReenExe\TicTac\PlayerAcademy\SequencePlayerAcademy;

class SequencePlayerBehaviorTest extends AbstractPlayerBehaviorTest
{
    public function gameProvider()
    {
        return [
            [
                Choice::instance(Choice::ZERO), Choice::instance(Choice::CROSS), [6, 7, 8],
            ],
        ];
    }

    protected function getAcademy()
    {
        return new SequencePlayerAcademy();
    }
}