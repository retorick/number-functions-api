<?php
require 'output.php';

class Phi extends Output {
    private $_phi;
    private $_pascal;

    public function __construct()
    {
        $this->_template = null;
        $this->_title = 'Phi';

        require 'pascal.php';
        require 'phidigits.php';
        $this->_phi = $phi;
        $this->_pascal = $pascal;
    }


    public function phiDigits($max = 100)
    {
        $data = substr($this->_phi, 0, $max);
        $this->_data = array(
            'digits' => $max,
            'phi_digits' => $this->_group($data, 10, $max)
        );
//        array_unshift($this->_data, '1.');
        $this->_template = 'phi_digits.html';
        $this->_title = 'Phi Digits'; 
    }


    public function phiPowers($power = 10)
    {
        $data = array();
        for ($p = 0; $p <= $power; $p++) {
            $data[$p] = $this->_get_phi_power($p);
        }
        $this->_data['phi_powers'] = $data;
        $this->_title = 'Powers of Phi';
        $this->_template = 'phi_powers.html';
    }

    private function _get_phi_power($p)
    {
        $whole = 0;
        $root = 0;

        for ($i = $p; $i >= 0; $i--) {
            if ($i % 2 == 0) {
                $whole += $this->_pascal[$p][$p - $i] * pow(5, $i / 2);
            }
            else {
                $root += $this->_pascal[$p][$p - $i] * pow(5, ($i - 1) / 2);
            }
        }
        $cancel = pow(2, $p - 1);
        $whole /= $cancel;
        $root /= $cancel;
        $denominator = 2;

        return array(
            'power' => $p,
            'phi_num' => "($root&radic;5 + $whole) / 2",
            'real_value' => pow((pow(5, .5) + 1)/2, $p),
            'sqrt_5' => $root,
            'whole' => $whole,
            'denom' => $denominator,
        );
    }

    private function _group($data, $chunk_size = 10, $max) 
    {
        $groups = array();
        $grouped_data = rtrim(chunk_split($data, $chunk_size, ' '));
        return $grouped_data;
    }
}
