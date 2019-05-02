<?php

namespace Algn\Dice100;

/**
 * A dice which has the ability to show a histogram.
 */
class DiceHistogram
{
    use HistogramTrait;


    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getSerie()
    {
        return $this->serie;
    }


    function addData($data)
    {
        $this->serie = array_merge($data, $this->serie);
    }



    /**
     * Return a string with a textual representation of the histogram.
     *
     * @return string representing the histogram.
     */
    public function getAsText()
    {
        $nums = [];

        for ($i = 0; $i < count($this->serie); $i++) {
            $number = $this->serie[$i];

            isset($nums[$number]) ?  $nums[$number]++ : $nums[$number] = 1;
        }

        $string = "";

        foreach ($nums as $num => $count) {
            $string .= "{$num}: " . str_repeat("*", $count) . "\n";
        }

        return $string;
    }

    public function injectData(HistogramInterface $object)
    {
        $this->serie = $object->getHistogramSerie();
        $this->min   = $object->getHistogramMin();
        $this->max   = $object->getHistogramMax();
    }
}

/**
 * A trait implementing histogram for integers.
 */
trait HistogramTrait
{
    /**
     * @var array $serie  The numbers stored in sequence.
     */
    private $serie = [];



    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getHistogramSerie()
    {
        return $this->serie;
    }



    /**
     * Print out the histogram, default is to print out only the numbers
     * in the serie, but when $min and $max is set then print also empty
     * values in the serie, within the range $min, $max.
     *
     * @param int $min The lowest possible integer number.
     * @param int $max The highest possible integer number.
     *
     * @return string representing the histogram.
     */
    public function printHistogram(int $min = null, int $max = null)
    {
        $nums = [];

        for ($i = 0; $i < count($this->serie); $i++) {
            $number = $this->serie[$i];

            if ($number < $min || $number > $max) {
                continue;
            }

            isset($nums[$number]) ?  $nums[$number]++ : $nums[$number] = 1;
        }

        $string = "";

        foreach ($nums as $num => $count) {
            $string .= "{$num}: " . str_repeat("*", $count) . "\n";
        }

        echo $string;
    }
}
