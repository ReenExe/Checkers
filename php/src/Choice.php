<?php

namespace ReenExe\TicTac;

class Choice
{
    const CROSS = 'X';
    const ZERO = 0;

    private $choice;

    private function  __construct($choice)
    {
        $this->choice = $choice;
    }

    public function beginner()
    {
        return self::CROSS === $this->choice;
    }

    /**
     * @param $choice
     * @return Choice|false
     */
    public static function factory($choice)
    {
        static $possible = [self::CROSS, self::ZERO];

        if (in_array($choice, $possible, true)) {
            return new self($choice);
        }
    }
}