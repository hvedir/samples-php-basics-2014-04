<?php
//defined('KALKULATOR') || die('Nie wlasciwy plik');
if(!defined('KALKULATOR')) {
// 	die('Nie wlasciwy plik'); 
// 	echo 'Nie wlasciwy plik';
	header('Location: http://localhost/2/index.php');
	exit;
}


function calculate ($liczba1, $liczba2, $operator) {
	try {
		if($operator === '+') {
			return $liczba1+$liczba2;
		} 
		if($operator === '-') {
			return $liczba1-$liczba2;
		} 
		if($operator === '/') {
			return $liczba1/$liczba2;
		} 
		if($operator === '*') {
			return $liczba1*$liczba2;
		} 
		if($operator === '%') {
			return $liczba1%$liczba2;
		} 
		if($operator === '^') {
			return pow($liczba1,$liczba2);
		}
	}
	catch (Exception $e) {
		//???
	}
	return false;
}

