<?php

use ReenExe\TicTac\Choice;
use ReenExe\TicTac\Game;

class GameWinnerTest extends \PHPUnit_Framework_TestCase
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
}