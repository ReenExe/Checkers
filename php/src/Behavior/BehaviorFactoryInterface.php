<?php

namespace ReenExe\TicTac\Behavior;

use ReenExe\TicTac\Behavior;
use ReenExe\TicTac\Desk;
use ReenExe\TicTac\Choice;

interface BehaviorFactoryInterface
{
    /**
     * @param Desk $desc
     * @param Choice $player
     * @return Behavior
     */
    public function create(Desk $desc, Choice $player);
}