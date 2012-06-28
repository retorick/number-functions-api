<?php
require 'classes/output.php';

class Triangular extends Output {
    private $template = null;
    private $title = null;

    public function __construct()
    {
        $this->_template = null;
        $this->_title = 'Triangular Numbers';
    }

    public function isTriangular($n)
    {
        $result = $this->_is_triangular($n);
        if ($result) {
            $data = array(
                'number' => $n,
                'is_triangular' => 'Yes',
                'nth_triangular_number' => $result,
            );
        }
        else {
            $data = array(
                'number' => $n,
                'is_triangular' => 'No',
            );
        }
        $this->_data = $data;
        $this->_title = 'Triangular Test';
        $this->_template = 'is_triangular.html';
    }

    public function getTriangularSquaresUpTo($max)
    {
        $this->_data = $this->_hunt_triangular_squares($max);
    }

    public function isTriangularSquare($n)
    {
        return $this->_is_triangular_square($n);
    }

    public function nthTriangular($nth)
    {
        return $this->_nth_triangular($nth);
    }


    public function getTriangularsFromTo($from, $to)
    {
        $tri = array();
        for ($i = $from; $i <= $to; $i++) {
            $tri['triangular_list'][$i] = $this->_nth_triangular($i);
        }
        $this->_template = 'triangular_range.html';
        $this->_data = $tri;
    }


    private function _nth_triangular($nth)
    {
        $t = $nth * ($nth+1) / 2;
        return $t;
    }

    private function _is_triangular($t)
    {
        $nth = floor(pow(2*$t, .5));
        if ($this->_nth_triangular($nth) == $t) 
            return $nth;
        else
            return false;
    }

    private function _is_triangular_square($t)
    {
        $square = pow($t, .5) == floor(pow($t, .5));
        return $square && $this->_is_triangular($t);
    }

    private function _near_triangular_less_than($n)
    {
        $nth = floor(pow(2*$n, .5));
        return $nth;
    }

    private function _hunt_triangular_squares($nth)
    {
        $ts_array = array();
        for ($i = 1; $i <= $nth; $i++) {
            $t = $this->_nth_triangular($i);
            if ($this->_is_triangular_square($t)) {
                $ts_array[$i] = array(
                    'number' => $t,
                    'nth_triangular_number' => $i,
                    'square_root' => pow($t, .5),
                );
            }
        }
        return $ts_array;
    }
}
?>
