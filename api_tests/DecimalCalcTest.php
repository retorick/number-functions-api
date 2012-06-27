<?php
require_once '../classes/decimalcalc.php';

class DecimalCalcTest extends PHPUnit_Framework_TestCase {

    /**
     * Fraction and decimal data to be used for multiple tests.  Each record contains:
     * Numerator, Denominator, Period of decimal, Number of digits in period that repeat.
     */
    public function singleFractionData()
    {
        return array(
            array(2, 13, '153846', 6),
            array(1, 2, '5', 0),
            array(1, 6, '16', 1),
            array(1, 12, '083', 1),
        );
    }

    /**
     * @dataProvider singleFractionData
     */
    function testSingleFractionPeriod($numerator, $denominator, $period, $repeating)
    {
        $decObj = new Decimal($denominator, $numerator);
        $this->assertEquals($period, $decObj->period);
    }


    /**
     * @dataProvider singleFractionData
     */
    function testSingleFractionRepeating($numerator, $denominator, $period, $repeating)
    {
        $decObj = new Decimal($denominator, $numerator);
        $this->assertEquals($repeating, $decObj->repeating);
    }


    public function getGCDData()
    {
        return array(
            array(6, 8, 2),
            array(16, 28, 4),
            array(9, 15, 3),
            array(3, 8, 1),
        );
    }


    /**
     * @dataProvider getGCDData
     */
    function testGetGCD($a, $b, $gcd)
    {
        $decObj = new Decimal(12, 3);
        $this->assertEquals($gcd, $decObj->test_get_gcd($a, $b));
    }


    public function countNonRepeatingData()
    {
        return array(
            array(10, 6, 1),
            array(10, 24, 3),
            array(10, 7, 0),
            array(10, 75, 2),
        );
    }

    /**
     * @dataProvider countNonRepeatingData
     */
    function testCountNonRepeating($base, $denominator, $non_repeating)
    {
        $decObj = new Decimal($denominator, 1);
        $this->assertEquals($non_repeating, $decObj->test_count_non_repeating($denominator, $base));
    }
}
?>
