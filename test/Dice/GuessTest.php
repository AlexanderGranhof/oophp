<?php

namespace Algn\Guess;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class GuessCreateObjectTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObjectNoArguments()
    {
        $guess = new Guess();
        $this->assertInstanceOf("\Algn\Guess\Guess", $guess);

        $res = $guess->getTries();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }



    /**
     * Construct object and verify that the object has the expected
     * properties. Use only first argument.
     */
    public function testCreateObjectFirstArgument()
    {
        $guess = new Guess(6, 42);
        $this->assertInstanceOf("\Algn\Guess\Guess", $guess);

        $res = $guess->getTries();
        $exp = 6;
        $this->assertEquals($exp, $res);

        $res = $guess->getNumber();
        $exp = 42;
        $this->assertEquals($exp, $res);
    }



    /**
     * Construct object and verify that the object has the expected
     * properties. Use both arguments.
     */
    public function testCreateObjectBothArguments()
    {
        $guess = new Guess(7, 42);
        $this->assertInstanceOf("\Algn\Guess\Guess", $guess);

        $res = $guess->getTries();
        $exp = 7;
        $this->assertEquals($exp, $res);

        $res = $guess->getNumber();
        $exp = 42;
        $this->assertEquals($exp, $res);
    }

    public function testReset()
    {
        $guess = new Guess();

        $num = $guess->getNumber();

        $guess->reset();

        $this->assertFalse($num == $guess->getNumber());
    }

    public function testMakeGuess()
    {
        $guess = new Guess();

        $guessStr = $guess->makeGuess(4);

        $this->assertInternalType("string", $guessStr);
    }
}
