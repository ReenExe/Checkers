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

    public function __construct(Desk $desc, Choice $player)
    {
        $this->desc = $desc;
        $this->player = $player;
    }

    protected function put($position)
    {
        $this->desc->put($position, $this->player);
    }

    abstract public function getNext();
}