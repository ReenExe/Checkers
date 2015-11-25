<?php

namespace ReenExe\TicTac;

class Desk
{
    /**
     * @var Choice[]
     */
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
        return $this->map + $this->getEmptyMap();
    }

    public function full()
    {
        return 9 === count($this->map);
    }

    public function __debugInfo()
    {
        $map = $this->getEmptyMap();

        foreach ($this->map as $position => $choice) {
            $map[$position] = (string) $choice;
        }

        return [$map];
    }

    private function getEmptyMap()
    {
        return array_fill(0, 9, false);
    }
}