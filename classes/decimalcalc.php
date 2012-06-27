<?php
/*
CLASS DecimalCollection
    A fraction list object is instantiated with three pieces of data:  
    a numerator range, a denominator, and a number base.

PROPERTIES
    public:
        $base: number base (defaults to 10).
        $fraction: list of fraction objects (FractionObj).


METHODS
        
    PUBLIC __construct:  Object constructor.  Builds list of fraction objects.


    PRIVATE parse:  parses the numerator range and returns an array.  This is
    expected to be either one integer or else a starting and stopping integer.

*/
class DecimalCollection {
    public $base, $fraction;

    public function __construct($denom, $num, $base)
    {
        list($num1, $num2) = $this->parse($num);
        if ($num2 >= $denom) { $num2 = $denom - 1; }
        $this->base = strlen($base) == 0 ? 10 : $base;
        if ($this->base != 10) {
            $num1 = base_convert($num1, $this->base, 10);
            $num2 = base_convert($num2, $this->base, 10);
            $denom = base_convert($denom, $this->base, 10);
        }

        for ($i = $num1; $i <= $num2; $i++) {
            $this->fraction[$i] = new Decimal($denom, $i, $base);
        }
    }


    private function parse($n) {
        $nrange = array(); 
        if (preg_match("/^([0-9a-zA-Z]+)\s*-\s*([0-9a-zA-Z]+)$/", $n, $matches)) {
            $nrange[] = $matches[1]; 
            $nrange[] = $matches[2]; 
        }
        else {
            $nrange[] = $n;
            $nrange[] = $n;
        }
        return $nrange;
    }
}


/*
CLASS Decimal
    A fraction object is instantiated with three pieces of data:  a numerator,
    a denominator, and a number base.


METHODS
        
    PUBLIC __construct:  Object constructor.  Sets the public properties
    directly, or else calls the methods that sets them.


    PUBLIC __get:  Magic method getter.  Used to expose certain private
    properties, which are specified in the private propert $_exposed_privates.

    PRIVATE calc_decimal:  Calculate the decimal expansion for the specified 
    numerator, denominator, and base.  Calculation is performed using long-
    division, rather than relying on the computer's internal precision.  In 
    this way, the calculation can be performed to far more decimal places than 
    otherwise possible.


    PRIVATE count_non_repeating.  Calculate and return the number of decimal 
    places that do not repeat, or -1 if the fraction resolves.  The number of 
    non-repeating decimal places is calculated by comparing the denominator's 
    prime factors with those of the number base.


    PRIVATE function get_gcd:  Calculate and return the greatest common factor 
    of two integers.

*/
class Decimal {
    private $primes = array(
        2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97
    );
    private $num;
    private $denom;
    private $reduced_num;
    private $reduced_denom;
    private $base;
    // While I wish to use the magic method __get, I don't want it to expose all privates--just these ones:
    private $_exposed_privates = array('fraction', 'period', 'repeating', 'period_length');
    private $fraction;
    private $period;
    private $period_length;
    private $repeating;


    public function __construct($denom, $num)
    {
        $this->num = $num;
        $this->denom = $denom;
        $gcf = $this->get_gcd($num, $denom);  // GCF of numerator and denominator, for ensuring a reduced fraction.
        $this->reduced_num = $num / $gcf;
        $this->reduced_denom = $denom / $gcf;
        $this->base = 10;
        if ($this->reduced_denom < $this->denom) {
            $this->fraction = "$this->num / $this->denom ($this->reduced_num / $this->reduced_denom)";
        }
        else {
            $this->fraction = "$this->reduced_num / $this->reduced_denom";
        }
        // calc_decimal sets three additional properties:  decimal_length, repeating, and decimal.
        $this->calc_decimal();
    }


    public function __get($prop)
    {
        if (false !== array_search($prop, $this->_exposed_privates)) {
            return $this->$prop;
        }
    }


    private function calc_decimal() {
        $section_list = array('', '', '');
        $section_ndx = 0;

        $non_repeating = $this->count_non_repeating($this->reduced_denom, $this->base);
        $non_repeating_tally = $non_repeating == -1 ? $this->reduced_denom - 1 : $non_repeating;
        $remainder_flag_list = array_fill(1, $this->reduced_denom - 1, false);
        $repeating_decimal_flag = $non_repeating != -1;
        $start_repeat = 0;
        $step_digit = 0;
        $step_remainder = $this->reduced_num;
        $decimal_length = 0;
        $linelength = 54;

        // ----- BEGIN LONG DIVISION -----
        while ($step_remainder != 0 && !$remainder_flag_list[$step_remainder]) {
            $remainder_flag_list[$step_remainder] = true;
            $step_digit = floor($step_remainder * $this->base / $this->reduced_denom);
            if ($decimal_length == $non_repeating_tally) {
                $section_ndx++;
                $start_repeat = $step_remainder;  // Store this digit; it'll be used to determine when/if the complement begins.
            }
            $section_list[$section_ndx] .= ($this->base != 10 ? base_convert($step_digit, 10, $this->base) : $step_digit);
            $step_remainder = $step_remainder * $this->base - $step_digit * $this->reduced_denom;
            if ($step_remainder + $start_repeat == $this->reduced_denom) {
                $section_ndx++;
            }
            $decimal_length++;
        }
        // ----- END LONG DIVISION -----

        $repeating = $repeating_decimal_flag ? $decimal_length - $non_repeating_tally : 0;

        $this->period_length = $decimal_length;
        $this->repeating = $repeating;
        $this->period = implode($section_list);
    }


    /**
     * test_count_non_repeating.  Provide access for unit testing to private method.
     */
    public function test_count_non_repeating($denom, $base)
    {
        return $this->count_non_repeating($denom, $base);
    }


    /**
     * count_non_repeating.  The number of non-repeating decimal places is determined by the common factors between the number base and the denominator.  
     * For each full or partial time the base divides the denominator, there is a non-repeating decimal place.
     */
    private function count_non_repeating($denom, $base) {
        $base_factor_tally = 0;
        $denom_tmp = $denom;
        $base_tmp = $base;
        $max_non_repeat_tally = 0;
        $non_repeat_tally = 0;
        $prime_ndx = 0;
        $retval = 0;

        $current_prime = $this->primes[$prime_ndx];
        while ($current_prime <= $base_tmp) {

            $non_repeat_tally = 0;
            $base_factor_tally = 0;

            // First, tally the occurrences of the present prime number in the base's set of factors.
            while (is_int($base_tmp / $current_prime)) {
                $base_tmp /= $current_prime;
                $base_factor_tally++;
            }      

            // If the present prime is a factor of the base, process this block.
            if ($base_factor_tally > 0) {
                $prime_power = pow($current_prime, $base_factor_tally);

                // First, divide out all complete sets of the present prime number from the denominator, and tally the number of divisions.
                while (is_int($denom_tmp / $prime_power)) {
                    $denom_tmp /= $prime_power;
                    $non_repeat_tally++;
                }

                // Second, check for any remaining instances of the prime number.  If there are any, increment the tally, and divide out all that remain.
                if (is_int($denom_tmp / $current_prime)) {
                    $non_repeat_tally++;
                    while (is_int($denom_tmp / $current_prime)) {
                        $denom_tmp /= $current_prime;
                    }
                }

                // Keep the $max_non_repeat_tally up-to-date.
                $max_non_repeat_tally = max($non_repeat_tally, $max_non_repeat_tally);
            }

            $prime_ndx++;
            $current_prime = $this->primes[$prime_ndx];
        }

        /* 
            If $denom_tmp is equal to 1 at this point, the denominator's prime factors are all included in the set of factors for the base, which means the decimal resolves.
            If the denominator has no factors in common with the base, then there are no non-repeating digits.
        */
        $retval = $denom_tmp == 1 ? -1 : $max_non_repeat_tally;
        return $retval;
    }


    /**
        test_get_gcd.  Provide a handle to private get_gcd method, for unit test.
     */
    public function test_get_gcd($a, $b) {
        return $this->get_gcd($a, $b);
    }


    /**
        get_gcd:  Calculate greatest common divisor.
     */
    private function get_gcd($int1, $int2) {
        $ints = array($int1, $int2);

        $finished = false;
        while (!$finished) {
            $ints = array(max($ints), min($ints));
            if (is_int($ints[0] / $ints[1])) {
                $finished = true;
            } else {
                $ints[0] = $ints[0] - $ints[1];
            }
        }
        return $ints[1];
    }


}
?>
