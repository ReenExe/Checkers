<?php

use ReenExe\TicTac\Choice;

class ChoiceTest extends \PHPUnit_Framework_TestCase
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

    /**
     * @dataProvider failDataProvider
     */
    public function testFailChoice($choice)
    {
        $this->assertFalse(Choice::instance($choice));
    }

    public function failDataProvider()
    {
        yield [''];
        yield [false];
        yield ['A'];
    }
}