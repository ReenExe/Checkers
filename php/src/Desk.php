<?php

namespace ReenExe\TicTac;

class Desk
{
    private $map = [];

    /**
     * @param $position
     * @param Choice $choice
     * @return bool
     */
    public function put($position, Choice $choice)
    {
        if (isset($this->map[$position])) return false;

        if ($position < 0 || $position > 8) return false;

        $this->map[$position] = $choice;

        return true;
    }

    public function toArray()
    {
        return $this->map;
    }

    public function toMap()
    {
        return $this->map + array_fill(0, 9, false);
    }

    public function full()
    {
        return 9 === count($this->map);
    }
}