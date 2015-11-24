<?php

namespace ReenExe\TicTac;

/**
 * Patter `Factory`
 * Class PlayerAcademy
 * @package ReenExe\TicTac
 */
class PlayerAcademy
{
    public static function getPlayer(Choice $choice)
    {
        return new Player($choice);
    }
}