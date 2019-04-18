<?php
namespace Algn\Guess;

class Guess
{

    private $maxTries;
    private $number;
    private $tries = 0;
    private $max = 100;
    private $min = 0;

    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number if no value is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */
    
    public function __construct(int $maxTries = 6, int $number = -1)
    {
        $this->number = $number >= 0 ? $number : rand($this->min, $this->max);
        $this->maxTries = $maxTries;
    }

    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @return void
     */
    
    public function reset()
    {
        $this->number = rand($this->min, $this->max);
        $this->tries = 0;
    }

    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */
    
    public function getTries()
    {
        return $this->maxTries;
    }

    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */
    
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */
    
    public function makeGuess(int $number)
    {
        if ($number > 100 || $number < 0) {
            throw new GuessException("Number must be between the range of 0,100");
        }

        $exceeded = ++$this->tries > $this->maxTries;
        $correct = $this->number == $number;
        $triesLeft = $this->maxTries - $this->tries;
        $low = $this->number > $number;

        $data = [
            "correct" => !$exceeded ? $correct : false,
            "low" => !$exceeded ? $low : false,
            "high" => !$exceeded ? !$low : false,
            "triesLeft" => !$exceeded ? $triesLeft : $this->tries,
            "exceeded" => $exceeded
        ];


        return json_encode($data);
    }
}
