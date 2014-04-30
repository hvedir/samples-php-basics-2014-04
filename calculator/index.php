<?php
define ('KALKULATOR', 1);
include_once __DIR__.'/lib.php';

// Logika
session_start();
if (isset($_SESSION['poprzedniWynik'])) {
	$pokaz_opcje = true;
} else {
	$pokaz_opcje = false;
}

// Jezeli zostale wyslane dane metoda POST to liczymy
if (count($_POST) > 0) {
	
	$liczba1 = null;
	$liczba2 = null;


	if ($_POST['uzyj_jako_liczbe_1_wynik_z_sessji'] === 'tak') {
		$liczba1 = $_SESSION['poprzedniWynik'];
	} else {
		$liczba1 = $_POST['recznie_wprowadzona_wartosc_liczby_1'];
	}

	if ($_POST['uzyj_jako_liczbe_2_wynik_z_sessji'] === 'tak') {
		$liczba2 = $_SESSION['poprzedniWynik'];
	} else {
		$liczba2 = $_POST['recznie_wprowadzona_wartosc_liczby_2'];
	}
	
	$_SESSION['poprzedniWynik'] = calculate($liczba1, $liczba2, $_POST['operator']);
}

// koniec Logiki

include __DIR__.'/template.phtml';