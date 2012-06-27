<?php
require 'Slim/Slim.php';
require 'Slim/View.php';
require 'api_functions/functions.php';
require 'Slim-Extras/Views/TwigView.php';

$app = new Slim(array(
    'view' => new TwigView()
    ));

$app->get('/', function() use ($app) { $app->redirect('/intro.php'); } );

// Decimal Calculator
$app->get('/dc/:denom(/:num)',  '\ArithmophileAPI\dc_denom_num')    ->conditions(array('denom' => '\d+', 'num' => '\d+'));

// Triangular numbers
$app->get('/tri/upto/:max',     '\ArithmophileAPI\tri_upto')        ->conditions(array('max' => '\d+'));
$app->get('/tri/:from/:to',     '\ArithmophileAPI\tri_from_to')     ->conditions(array('from' => '\d+', 'to' => '\d+'));
$app->get('/tri/:from/to/:to',  '\ArithmophileAPI\tri_from_to')     ->conditions(array('from' => '\d+', 'to' => '\d+'));
$app->get('/tri/test/:num',     '\ArithmophileAPI\tri_test')        ->conditions(array('num' => '\d+'));
$app->get('/tri/sq/upto/:max',  '\ArithmophileAPI\tri_square_upto') ->conditions(array('max' => '\d+'));

// Phi
$app->get('/phi/:digits',       '\ArithmophileAPI\phi_digits')      ->conditions(array('digits' => '\d+'));
$app->get('/phi/powers(/:max)', '\ArithmophileAPI\phi_powers')      ->conditions(array('max' => '\d+'));

// Prime numbers
$app->get('/p/upto/:max',       '\ArithmophileAPI\primes_upto')     ->conditions(array('max' => '\d+'));
$app->get('/p/:from/:to',       '\ArithmophileAPI\primes_from_to')  ->conditions(array('from' => '\d+', 'to' => '\d+'));
$app->get('/p/:n',              '\ArithmophileAPI\prime_check')     ->conditions(array('n' => '\d+'));

$app->run();
?>
