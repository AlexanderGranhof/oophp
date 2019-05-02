<?php

use PHPUnit\Framework\TestCase;


/**
 * Example test class.
 */
class HistogramTest extends TestCase
{
    public function testgetSerie()
    {
        $histogram = new Algn\Dice100\DiceHistogram();

        $result = $histogram->getSerie();

        $this->assertInternalType("array", $result);
    }

    public function testaddData()
    {
        $histogram = new Algn\Dice100\DiceHistogram();

        $histogram->addData([1, 2]);

        $result = $histogram->getSerie();

        $this->assertEquals([1, 2], $result);
    }

    public function testgetAsText()
    {
        $histogram = new Algn\Dice100\DiceHistogram();

        $result = $histogram->getAsText();

        $this->assertInternalType("string", $result);
    }
}
