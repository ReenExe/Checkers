<?php

use ReenExe\TicTac\Player;
use ReenExe\TicTac\Choice;
use ReenExe\TicTac\Desk;
use ReenExe\TicTac\Game;

class TicTacTest extends \PHPUnit_Framework_TestCase
{
    public function testSuccessChoice()
    {
        $cross = Choice::instance(Choice::CROSS);

        $this->assertTrue($cross->beginner());

        $zero = Choice::instance(Choice::ZERO);

        $this->assertFalse($zero->beginner());

        $this->assertSame($cross, $zero->other());

        $this->assertSame($zero, $cross->other());
    }

    public function testFailChoice()
    {
        $this->assertEmpty(Choice::instance(''));
    }

    public function testGameWinner()
    {
        $c = Choice::instance(Choice::CROSS);

        $z = Choice::instance(Choice::ZERO);

        $desc = [
            $c, $c, $z,
            $c, $c, $z,
            $z, $z, $c,
        ];

        $this->assertSame($c, Game::getWinner($desc));
    }

    public function testDesk()
    {
        $desk = new Desk();

        $choice = Choice::instance(Choice::CROSS);

        for ($position = 0; $position < 8; $position++) {
            $this->assertTrue($desk->put($position, $choice));
            $this->assertFalse($desk->full());
        }

        $this->assertTrue($desk->put(8, $choice));
        $this->assertTrue($desk->full());

        for ($position = 0; $position <= 8; $position++) {
            $this->assertFalse($desk->put($position, $choice));
        }
    }

    public function testPlay()
    {
        $player = new Player(Choice::instance(Choice::CROSS));
        $partner = new Player(Choice::instance(Choice::ZERO));

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

    public function testWin()
    {
        // 6, 7, 8

        $partner = new Player(Choice::instance(Choice::ZERO));

        $partner->step(6);
        $partner->step(7);
        $partner->step(8);

        $answer = $partner->answer();
        $this->assertTrue($answer->finish());
        $this->assertSame($answer->getWinner(), Choice::instance(Choice::CROSS));
    }
}