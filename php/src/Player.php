<?php

namespace ReenExe\TicTac;

use ReenExe\TicTac\Answer\Factory;
use ReenExe\TicTac\Behavior\Strategy;

class Player
{
    /**
     * @var Desk
     */
    public $desk;

    /**
     * @var Choice
     */
    private $choice;

    private $behavior;

    /**
     * @var Answer|null
     */
    private $lastAnswer;

    public function __construct(Choice $choice)
    {
        $this->choice = $choice;

        $this->desk = new Desk();

        $this->behavior = new Strategy($this->desk, $this->choice);

        if ($choice->beginner()) {
            $this->lastAnswer = $this->behavior->getNext();
        }
    }

    public function step($position)
    {
        if ($this->finish()) return false;

        if ($this->desk->put($position, $this->choice->other())) {

            if ($winner = Game::getWinner($this->desk->toMap())) {
                $this->lastAnswer = Factory::createWinner($winner);
            } elseif ($this->desk->full()) {
                $this->lastAnswer = Factory::createWinner();
            } else {
                $this->lastAnswer = $this->behavior->getNext();
            }

            return true;
        }

        return false;
    }

    /**
     * @return Answer|null
     */
    public function answer()
    {
        return $this->lastAnswer;
    }

    private function finish()
    {
        return $this->answer() && $this->answer()->finish();
    }
}