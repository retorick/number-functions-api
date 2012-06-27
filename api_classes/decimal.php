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
            $data['decimal_table'][] = array(
                    'fraction' => $fraction->fraction,
                    'decimal' => $fraction->period,
                    'length' => $fraction->period_length,
                    'repeating' => $fraction->repeating,
                );
        }
        $this->_data = $data;
    }

    public function output()
    {
        global $app;

        $app->render('decimal.html', array_merge(array('title' => 'Decimal Calculator'), $this->_data));
    }
}
?>
