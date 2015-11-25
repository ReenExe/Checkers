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
            [
                Choice::instance(Choice::CROSS), Choice::instance(Choice::ZERO), [6, 7, 0, 3],
            ],
            [
                Choice::instance(Choice::CROSS), Choice::instance(Choice::CROSS), [2, 5, 6],
            ],
        ];
    }

    protected function getAcademy()
    {
        return new SequencePlayerAcademy();
    }
}