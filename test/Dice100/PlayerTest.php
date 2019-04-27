<?php

use PHPUnit\Framework\TestCase;


/**
 * Example test class.
 */
class PlayerTest extends TestCase
{
    public function testRoll() {
        $player = new Algn\Dice100\Player();

        $result = $player->roll();

        $this->assertInternalType("array", $result);
    }

    public function testRollStart() {
        $player = new Algn\Dice100\Player();

        $result = $player->rollStart();

        $this->assertInternalType("array", $result);
    }

    public function testFinishTurn() {
        $player = new Algn\Dice100\Player();

        $result = $player->finishTurn();

        $this->assertInternalType("int", $result);
        $this->assertEquals(0, $result);
    }
}
