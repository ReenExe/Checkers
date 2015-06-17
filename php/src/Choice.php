<?php

namespace ReenExe\TicTac;

class Choice
{
    const CROSS = 'X';
    const ZERO = 0;

    private $choice;

    /**
     * @var Choice
     */
    private $other;

    private function  __construct($choice)
    {
        $this->choice = $choice;
    }

    public function beginner()
    {
        return self::CROSS === $this->choice;
    }

    /**
     * @return Choice
     */
    public function other()
    {
        return $this->other;
    }

    /**
     * @param $choice
     * @return Choice|false
     */
    public static function instance($choice)
    {
        if ($choice === self::CROSS || $choice === self::ZERO) {
            static $instances;
            
            if (empty($instances)) {
                $instances = [
                    self::CROSS => $cross = new self(self::CROSS),
                    self::ZERO => $zero = new self(self::ZERO),
                ];
                $cross->other = $zero;
                $zero->other = $cross;
            }

            return $instances[$choice];
        }
    }
}