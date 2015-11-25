<?php

use ReenExe\TicTac\Player;
use ReenExe\TicTac\Choice;
use ReenExe\TicTac\Desk;
use ReenExe\TicTac\PlayerAcademy\StrategyPlayerAcademy;

class TicTacTest extends \PHPUnit_Framework_TestCase
{
    public function testDesk()
    {
        $desk = new Desk();

        $choice = Choice::instance(Choice::CROSS);

        for ($position = 0; $position < 8; ++$position) {
            $this->assertTrue($desk->put($position, $choice));
            $this->assertFalse($desk->put($position, $choice));
            $this->assertFalse($desk->full());
        }

        $this->assertTrue($desk->put(8, $choice));
        $this->assertTrue($desk->full());
    }

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