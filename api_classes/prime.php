<?php
require 'classes/output.php';

class Prime extends Output {
    public function __construct()
    {
        include('prime_numbers.php');
        $this->_primes = $primes;
    }

    public function showPrimesFromTo($from, $to)
    {
        $this->_data = $this->_list_primes_from_to($from, $to);
        $this->_title = 'Prime Numbers';
        $this->_template = 'prime_numbers.html';
    }

    public function isPrime($n)
    {
        $factors = $this->_factor($n);
        $data = array(
            'number' => $n,
            'prime_factors' => $factors,
        );
        $this->_title = 'Prime Factors';
        $this->_template = 'is_prime.html';
        $this->_data = $data;
    }

    private function _factor($n)
    {
        $factors = array();
        $pndx = 0;
        $max_prime = floor($n / 2);
        while ($this->_primes[$pndx] <= $max_prime) {
            if ($n % $this->_primes[$pndx] == 0) {
                $factors[] = $this->_primes[$pndx];
            }
            $pndx++;
        }

        return $factors;
    }

    private function _list_primes_from_to($from, $to)
    {
        $list = array('primes_listed' => 0);
        foreach ($this->_primes as $ndx => $p) {
            if ($p >= $from and $p <= $to) {
                $list['prime_numbers'][$ndx + 1] = $p; 
            }
        }
        $list['primes_listed'] = sizeof($list['prime_numbers']);
        return $list;
    }
}
?>
