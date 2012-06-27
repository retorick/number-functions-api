<?php
require_once '../triangular.php';

class TriangularTest extends PHPUnit_Framework_TestCase {

    public function nthTriangularData()
    {
        return array(
            array(2, 3),
            array(6, 21),
            array(12, 78),
        );
    }

    /**
     * @dataProvider nthTriangularData
     */
    public function testNthTriangular($n, $t)
    {
        $triObj = new Triangular();
        $this->assertEquals($t, $triObj->nthTriangular($n));
    }

    /**
     */
    public function isTriangularData()
    {
        return array(
            array(1, true),
            array(3, true),
            array(6, true),
        );
    }

    /**
     * @depends testNthTriangular
     * @dataProvider isTriangularData
     */
    function testIsTriangular($n, $result)
    {
        $triObj = new Triangular();
        $this->assertEquals($result, $triObj->isTriangular($n));
    }


    public function isTriangularSquareData()
    {
        return array(
            array(1, true),
            array(15, false),
            array(25, false),
            array(36, true),
        );
    }

    /**
     * @dataProvider isTriangularSquareData
     */
    public function testIsTriangularSquare($t, $result)
    {
        $triObj = new Triangular();
        $this->assertEquals($triObj->isTriangularSquare($t), $result);
    }

}
?>
