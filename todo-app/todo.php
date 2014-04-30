<?php
session_start();
if (!isset($_SESSION['todo'])) {
	$_SESSION['todo'] = array();
}

// Export
if (isset($_GET['action']) && 'export' === $_GET['action']) {
	header('Content-Disposition: attachment, filename=todo.xls');
	die;
}

// jezeli wyslany postem TODO
# to doddajemy do listy:
/* $_SESSION['todo'] []= ... */
if (isset($_POST['nowe_zadanie'])) {
	$_SESSION['todo'] []= $_POST['nowe_zadanie'];
}
else if (isset($_POST['usun_zadanie'])) {
	$id = $_POST['usun_zadanie'];
	if (isset($_SESSION['todo'][$id])) {
		unset ($_SESSION['todo'][$id]);
	}
}

?><!DOCTYPE html">
<html>
<head>
<meta charset="UTF-8">
<title>TODO LIST</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="container">
<h3>
	Lista zadan
	<a href="?action=export" class="pull-right btn btn-default btn-sm<?php echo (count($_SESSION['todo']) > 0)?'':' hide';?>">
		Exportuj <i class="fa fa-download fa-lg"></i>
	</a>
</h3>
<?php
//jezeli lista zawiera elementy: count($_SESSION['todo']) > 0
// TO ponizszy kawalek  
if (count($_SESSION['todo']) > 0):
?>
<ul class="list-group">
	<?php
	foreach ($_SESSION['todo'] as $id => $zadanie) { 
		include __DIR__.'/templates/todo-item.php';
	} 
	?>
</ul>
<form action="" method="POST" class="form-inline">
	<select name="usun_zadanie" class="form-control input-md">
		<?php
		//foreach 
		// option value => $id
		// option Label => $zadanie['tytul'] 
		foreach ($_SESSION['todo'] as $id => $zadanie) { 
			echo "<option value=\"{$id}\">{$zadanie['tytul']}</option>";
		} 
		?>
	</select> 
	<button type="submit" class="btn btn-md btn-danger">
		Usun <i class="fa fa-lg fa-trash"></i>
	</button>
</form>
<?php
else:
?>
<p>Brak zadan, dodaj nowe</p>
<?php
endif; 
?>
<form action="" method="POST" class="form-inline">
	<div class="form-group">
		<input type="text" name="nowe_zadanie[tytul]" class="form-control input-md" placeholder="Tytul">
	</div>
	<div class="form-group">
		<input type="text" name="nowe_zadanie[opis]" class="form-control input-md" placeholder="Opis">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary btn-md"><i class="fa fa-lg fa-save"></i> Dodaj do listy</button>
	</div>
</form>
</body>
</html>