<?php

namespace ReenExe\TicTac;

use ReenExe\TicTac\Answer\Factory;
use ReenExe\TicTac\Behavior\BehaviorFactoryInterface;
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

    public function __construct(BehaviorFactoryInterface $behaviorFactory, Choice $choice)
    {
        $this->choice = $choice;

        $this->desk = new Desk();

        $this->behavior = $behaviorFactory->create($this->desk, $this->choice);

        if ($choice->beginner()) {
            $this->lastAnswer = $this->behavior->getNext();
        }
    }

    public function step($position)
    {
        if ($this->finish()) return false;

        if ($this->desk->put($position, $this->choice->other())) {
            $this->lastAnswer = $this->getSituation();
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

    private function getSituation()
    {
        if ($winner = Game::getWinner($this->desk->toMap())) {
            return Factory::createWinner($winner);
        }

        if ($this->desk->full()) {
            return Factory::createWinner();
        }

        return $this->behavior->getNext();
    }
}