<?php

use ReenExe\TicTac\Player;
use ReenExe\TicTac\Choice;
use ReenExe\TicTac\Desk;
use ReenExe\TicTac\Game;
use ReenExe\TicTac\PlayerAcademy\StrategyPlayerAcademy;

class TicTacTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider gameWinnerProvider
     */
    public function testGameWinner(array $desc, $winner)
    {
        $this->assertSame($winner, Game::getWinner($desc));
    }

    public function gameWinnerProvider()
    {
        $c = Choice::instance(Choice::CROSS);

        $z = Choice::instance(Choice::ZERO);

        return [
            [
                [
                    $c, $c, $z,
                    $c, $c, $z,
                    $z, $z, $c,
                ],
                $c
            ],
            [
                [
                    false, false, false,
                    $c, $c, $c,
                    $z, $z, false,
                ],
                $c
            ],
            [
                [
                    false, false, false,
                    false, false, false,
                    false, false, false,
                ],
                false
            ],
        ];
    }

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
        $player = StrategyPlayerAcademy::getPlayer(Choice::instance(Choice::CROSS));
        $partner = StrategyPlayerAcademy::getPlayer(Choice::instance(Choice::ZERO));

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
        $partner = StrategyPlayerAcademy::getPlayer($partnerChoice);

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
}