<?php

use ReenExe\TicTac\Player;
use ReenExe\TicTac\Choice;

class TicTacTest extends \PHPUnit_Framework_TestCase
{
    public function testChoice()
    {
        $cross = Choice::factory(Choice::CROSS);

        $this->assertTrue($cross->beginner());

        $zero = Choice::factory(Choice::ZERO);

        $this->assertFalse($zero->beginner());

        $this->assertEmpty(Choice::factory(''));
    }

    public function testCreatePlayer()
    {
        $player = new Player(Choice::factory(Choice::CROSS));
    }
}