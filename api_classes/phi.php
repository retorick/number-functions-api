<?php
require 'classes/output.php';

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
        $maxrows = sizeof($this->_pascal) - 1;
        $power = min($power, $maxrows);
        for ($p = 0; $p <= $power; $p++) {
            $data[$p] = $this->_get_phi_power($p);
        }
        $this->_data = $data;
        $this->_title = 'Powers of Phi';
        $this->_template = 'phi_powers.html';
    }

    /*
     * private method _get_phi_power: compute the requested power of phi.  This
     *    is done by taking (1 + sqrt(5)) / 2 and raising it to the specified power.
     *    Basically, this is the familiar (x+y)^n problem, solved using the binomial
     *    theorm.
     *
     *    So let x = sqrt(5) and y = 1.  (And it could as easily be the other way.)
     *    Since 1^n = 1, all the ys in the expansion are just going to be 1, so that
     *    we only need to worry about the powers of x, or sqrt(5).  Even powers of
     *    x will produce integers, while odd powers will produce terms that are
     *    multiples of sqrt(5).  This means our result will have just two terms:
     *    a + b(sqrt(5)), where a and b are integers.
     *
     *    Of course, the denominator must be accounted for.  This method yields a
     *    result that, for an excellent reason, uses 2 for the denominator.  Since
     *    a request for phi^p will entail a denominator of 2^p, it is necessary to
     *    cancel 2^(p-1) from both the numerator and the denominator.  Interestingly,
     *    both terms in the numerator will always remain integers, even with the 2s
     *    canceled out.
     *
     *    Once the calculations are done, the method compiles various pieces of
     *    information about the requested power and returns them in a hash.
     */
    private function _get_phi_power($p)
    {
        $whole = 0;
        $root = 0;
        $cancel = pow(2, $p - 1);

        for ($i = $p; $i >= 0; $i--) {
            // sqrt(5) raised to an even power (i) yields the integer 5^(i/2).
            if ($i % 2 == 0) {
                $add = $this->_pascal[$p][$p - $i] * pow(5, $i / 2);
                $whole += $add;
            }
            // sqrt(5) raised to an odd power yields an integer * sqrt(5).
            //    That integer is naturally 5^((i-1)/2).
            else {
                $add = $this->_pascal[$p][$p - $i] * pow(5, ($i - 1) / 2);
                $root += $add;
            }
        }
        // at this point, we have two sums:  the whole number part, and the
        // "coefficient" for sqrt(5).  Since the denominator is going to be 2,
        // we must cancel out the appropriate power of 2 from the numerator.
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

    /*
     * private method _group:  does nothing more exotic than take the given string,
     *    split it up into chunks of the specified size, and separate these with 
     *    spaces.
     */
    private function _group($data, $chunk_size = 10, $max) 
    {
        $groups = array();
        $grouped_data = rtrim(chunk_split($data, $chunk_size, ' '));
        return $grouped_data;
    }
}
