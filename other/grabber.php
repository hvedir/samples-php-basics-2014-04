<?php

$results = (array_key_exists('q',$_GET) && !empty($_GET['q']))?
	// jezeli mamy nie pusty text zapytania
	file_get_content('http://php.net/manual-lookup.php?pattern='.urlencode($_GET['q'])):
	// inaczej
	'Wprowadz wyszukiwany text i kliknij szukaj';
?><!DOCTYPE html">
<html>
<head>
<meta charset="UTF-8">
<title>Cwana wyszukiwarka</title>
<link href="../vendor/bootstrap.min.css" rel="stylesheet">
<link href="../vendor/font-awesome.min.css" rel="stylesheet">
</head>
<body class="container">
<form method="POST" action="">
	<div form-ele
</form>
</body>
</html>
