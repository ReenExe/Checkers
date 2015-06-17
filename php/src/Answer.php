<?php

namespace ReenExe\TicTac;

class Answer
{
    /**
     * @var Choice|null
     */
    protected $winner;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var bool
     */
    protected $finish;

    /**
     * @return Choice|null
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * @return bool
     */
    public function finish()
    {
        return $this->finish;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }
}