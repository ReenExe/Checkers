<?php

use ReenExe\TicTac\Player;
use ReenExe\TicTac\Choice;
use ReenExe\TicTac\PlayerAcademy;

abstract class AbstractPlayerBehaviorTest extends \PHPUnit_Framework_TestCase
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

    abstract public function gameProvider();

    /**
     * @param Choice $choice
     * @return Player
     */
    public function getPlayer(Choice $choice)
    {
        return $this->getAcademy()->getPlayer($choice);
    }

    /**
     * @return PlayerAcademy
     */
    abstract protected function getAcademy();
}