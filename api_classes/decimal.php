<?php
require 'classes/decimalcalc.php';
require 'classes/output.php';

class DecimalData extends Output {

    public function __construct($denom, $num)
    {
        $outmode = 'text';

        $decObj = new DecimalCollection($denom, $num, 10);
        $data = array();
        foreach ($decObj->fraction as $fraction) {
            $data['decimal_table'][] = array(
                    'fraction' => $fraction->fraction,
                    'decimal' => $fraction->period,
                    'length' => $fraction->period_length,
                    'repeating' => $fraction->repeating,
                );
        }
        $this->_data = $data;
        $this->_title = 'Decimal Calculator';
        $this->_template = 'decimal.html';
    }
}
?>
