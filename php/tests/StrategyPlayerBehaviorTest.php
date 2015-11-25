<?php

use ReenExe\TicTac\Player;
use ReenExe\TicTac\Choice;
use ReenExe\TicTac\PlayerAcademy\StrategyPlayerAcademy;

class StrategyPlayerBehaviorTest extends AbstractPlayerBehaviorTest
{
    /**
     * @dataProvider gameProvider
     */
    public function testWin(Choice $partnerChoice, Choice $winner, array $steps)
    {
        $partner = $this->getPlayer($partnerChoice);

        foreach ($steps as $step) {
            $this->assertTrue($partner->step($step));
        }

        $answer = $partner->answer();
        $this->assertTrue($answer->finish());

        $this->assertSame($answer->getWinner(), $winner);
    }

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