<?php

use PHPUnit\Framework\TestCase;


/**
 * Example test class.
 */
class HandTest extends TestCase
{
    public function testRoll() {
        $hand = new Algn\Dice100\Hand();

        $result = $hand->roll();

        $this->assertInternalType("array", $result);
    }
}
