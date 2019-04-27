<?php

namespace Algn\Guess;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class GuessExceptionsTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testException()
    {
        $guess = new Guess();

        try {
            $guess->makeGuess(-1);
            $this->assertTrue(false);

        } catch (GuessException $e) {
            $this->assertTrue(true);
        }

    }
}
