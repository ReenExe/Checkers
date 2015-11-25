<?php

use ReenExe\TicTac\Player;
use ReenExe\TicTac\Choice;
use ReenExe\TicTac\PlayerAcademy\StrategyPlayerAcademy;

class StrategyPlayerBehaviorTest extends \PHPUnit_Framework_TestCase
{
    public function testPlay()
    {
        $player = $this->getPlayer(Choice::instance(Choice::CROSS));
        $partner = $this->getPlayer(Choice::instance(Choice::ZERO));

        $answer = $this->play($player, $partner);

        $this->assertTrue($answer->finish());
    }

    private function play(Player $from, Player $to)
    {
        $answer = $from->answer();

        if ($answer->finish()) {
            return $answer;
        }

        $to->step($answer->getPosition());

        return $this->play($to, $from);
    }

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
    
    public function getPlayer(Choice $choice)
    {
        $academy = new StrategyPlayerAcademy();

        return $academy->getPlayer($choice);
    }
}