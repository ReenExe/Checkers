<?php

namespace ReenExe\TicTac;

abstract class Behavior
{
    /**
     * @var Desk
     */
    protected $desc;

    /**
     * @var Choice
     */
    protected $player;

    //     0 1 2
    //     3 4 5
    //     6 7 8
    protected $queue = [4, 1, 2, 5, 8, 7, 6, 3, 0];

    public function __construct(Desk $desc, Choice $player)
    {
        $this->desc = $desc;
        $this->player = $player;
    }

    protected function put($position)
    {
        $this->desc->put($position, $this->player);
    }

    /**
     * @return Answer
     */
    abstract public function getNext();
}