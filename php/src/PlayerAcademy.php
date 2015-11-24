<?php

namespace ReenExe\TicTac;

/**
 * Patter `Factory`
 * Class PlayerAcademy
 * @package ReenExe\TicTac
 */
abstract class PlayerAcademy
{
    public static function getPlayer(Choice $choice)
    {
        return new Player($choice);
    }

    abstract protected static function getBehavior();
}