<?php

use ReenExe\TicTac\Choice;
use ReenExe\TicTac\Desk;

class DeskTest extends \PHPUnit_Framework_TestCase
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
}