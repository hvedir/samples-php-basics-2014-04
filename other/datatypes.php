<?php
$x = array();

$x[0] = 10;
$x[1] = 20;
$x['x'] = array();


$x['summa'] = $x[0] + $x[1];

print_r($x);
/*
[
 0 => 10
 1 => 20
 x => []
] 
 */

