<?php
require 'classes/decimalcalc.php';
require 'output.php';

class DecimalData extends Output {

    public function __construct($denom, $num)
    {
        $outmode = 'text';

        $decObj = new DecimalCollection($denom, $num, 10);
        $data = array();
        foreach ($decObj->fraction as $fraction) {
            array_push($data, array(
                    'fraction' => $fraction->fraction,
                    'decimal' => $fraction->period,
                    'length' => $fraction->period_length,
                    'repeating' => $fraction->repeating,
                )
            );
        }
        $this->_data = $data;
    }
}
?>
