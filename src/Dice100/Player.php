<?php
namespace Algn\Dice100;

/**
 * Player class for the game dice100
 */
class Player
{
    private $hand;
    private $score;
    private $roundScore;
    private $maxScore;
    private $start;

    /**
     * @param int - Number of dies the player has
     * @param int - The max score of the game
     */
    public function __construct(int $dice = 3, int $maxScore = 100)
    {
        $this->hand = new Hand($dice);
        $this->score = 0;
        $this->roundScore = 0;
        $this->maxScore = $maxScore;
        $this->start = 0;
    }

    /**
     * Rolls the dies of the player
     * @return Array
     */

    public function roll()
    {
        $rolls = $this->hand->roll();

        if (in_array(1, $rolls)) {
            $this->roundScore = 0;
            $this->finishTurn();
        } else {
            $this->roundScore += array_sum($rolls);
        }

        return $rolls;
    }

    /**
     * The initial roll to determine which player starts
     * @return Array
     */

    public function rollStart()
    {
        $rolls = $this->hand->roll();

        $this->start = array_sum($rolls);

        return $rolls;
    }

    /**
     * Ends the players turn
     * @return int
     */

    public function finishTurn()
    {
        $this->score += $this->roundScore;
        $this->roundScore = 0;

        return $this->roundScore;
    }
}

/**
 * The hand which contains the dies
 */

class Hand
{
    private $dice;

    /**
     * @param int - Number of dies
     */

    public function __construct(int $dice = 6)
    {
        for ($i = 0; $i < $dice; $i++) {
            $this->dice[] = new Dice();
        }
    }

    /**
     * Rolls the hand
     * @return Array
     */

    public function roll()
    {
        for ($i = 0; $i < count($this->dice); $i++) {
            $rolls[] = $this->dice[$i]->roll();
        }

        return $rolls;
    }
}

/**
 * Class for a die
 */
class Dice
{
    private $values = [1, 2, 3, 4, 5, 6];

    /**
     * Rolls the die
     * @return int
     */
    public function roll()
    {
        return $this->values[array_rand($this->values)];
    }
}
