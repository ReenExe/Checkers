<?php

namespace ReenExe\TicTac;
use ReenExe\TicTac\Behavior\BehaviorFactoryInterface;

/**
 * Patter `Factory`
 * Class PlayerAcademy
 * @package ReenExe\TicTac
 */
abstract class PlayerAcademy
{
    public function getPlayer(Choice $choice)
    {
        return new Player($this->getBehaviorFactory(), $choice);
    }

    /**
     * @return BehaviorFactoryInterface
     */
    abstract protected function getBehaviorFactory();
}