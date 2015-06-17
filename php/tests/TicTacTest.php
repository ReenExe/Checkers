<?php

class TicTacTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $player = new \ReenExe\TicTac\Player();

        $this->assertInstanceOf('\ReenExe\TicTac\Player', $player);
    }
}