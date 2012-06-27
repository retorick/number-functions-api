<?php
namespace ArithmophileAPI;

function dc_denom_num($denom, $num = null)
{
    try {
        if ($num > $denom) {
            throw new \Exception('/dc/denom/num - num, if specified, must be less than denom.');
        }
        $num || $num = '1-' . ($denom - 1);
        require 'api_classes/decimal.php';
        $data = new \DecimalData($denom, $num);
        
        $data->output();
    }
    catch (\Exception $e) {
        echo 'Error:  ' . $e->getMessage();
    }
}

function tri_upto($max) 
{
    try {
        require 'api_classes/triangular.php';
        $triObj = new \Triangular();
        $triObj->getTriangularsFromTo(1, $max);

        $triObj->output();
    }
    catch (\Exception $e) {
    }
}

function tri_from_to($from, $to) 
{
    try {
        require 'api_classes/triangular.php';
        $triObj = new \Triangular();
        $triObj->getTriangularsFromTo($from, $to);
        $triObj->output();
    }
    catch (\Exception $e) {
    }
}

function tri_test($n) {
    try {
        require 'api_classes/triangular.php';
        $triObj = new \Triangular();

        $triObj->isTriangular($n);
        $triObj->output();
    }
    catch (\Exception $e) {
    
    }
}

function tri_square_upto($max) 
{
    try {
        require 'api_classes/triangular.php';
        $triObj = new \Triangular();
        $triObj->getTriangularSquaresUpTo($max);
        $triObj->output();
    }
    catch (\Exception $e) {
    }
}

function phi_digits($digits) 
{
    try {
        require 'api_classes/phi.php';
        $phiObj = new \Phi();
        $phiObj->phiDigits($digits);
        $phiObj->output();
    }
    catch (\Exception $e) {
    }
}

function phi_powers($max = 5) 
{
    try {
        require 'api_classes/phi.php';
        $phiObj = new \Phi();
        $phiObj->phiPowers($max);
        $phiObj->output();
    }
    catch (\Exception $e) {
    }
}

function primes_upto($max) 
{
    try {
        require 'api_classes/prime.php';
        $primeObj = new \Prime();
        $primeObj->showPrimesFromTo(1, $max);
        $primeObj->output();
    }
    catch (\Exception $e) {
    }
}

function primes_from_to($from, $to, $debug = null) 
{
    try {
        require 'api_classes/prime.php';
        $primeObj = new \Prime($debug);
        $primeObj->showPrimesFromTo($from, $to);
        $primeObj->output();
    }
    catch (\Exception $e) {
    }
}

function prime_check($n) 
{
    try {
        require 'api_classes/prime.php';
        $primeObj = new \Prime();
        $primeObj->isPrime($n);
        $primeObj->output();
    }
    catch (\Exception $e) {
    }
}
?>
