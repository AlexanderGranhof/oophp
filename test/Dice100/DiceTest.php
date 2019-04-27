<?php

use PHPUnit\Framework\TestCase;


/**
 * Example test class.
 */
class DiceTest extends TestCase
{
    public function testRoll() {
        $dice = new Algn\Dice100\Dice();

        $result = $dice->roll();

        $this->assertInternalType("int", $result);
    }
}
