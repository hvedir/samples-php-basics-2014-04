<li class="list-group-item">
	<form action="" method="POST" class="pull-right">
		<input type="hidden" name="usun_zadanie" value="<?php echo $id; ?>">
		<button class="close" type="submit">&times;</button>
	</form>
<?php
	if (isset($_POST['edytuj']) && (''.$id) === $_POST['edytuj']) {
?>
	<form action="" method="POST">
		<input type="hidden" name="uaktualnij_zadanie" value="<?php echo $id; ?>">
		<div class="form-group">
			<input type="text" name="zadanie[tytul]" value="<?php echo $zadanie['tytul']; ?>" class="form-control input-md" placeholder="Tytul">
		</div>
		<div class="form-group">
			<input type="text" name="zadanie[opis]" value="<?php echo $zadanie['opis']; ?>" class="form-control input-md" placeholder="Opis">
		</div>
		<div class="form-group text-right">
			<a href="" class="btn btn-link btn-md">Anuluj</a>
			<button type="submit" class="btn btn-primary btn-md"><i class="fa fa-lg fa-save"></i> Zapish</button>
		</div>
	</form>
<?php
	} else { 
?>
	<form action="" method="POST" class="pull-right" style="margin:0 20px;">
		<input type="hidden" name="edytuj" value="<?php echo $id; ?>">
		<button class="btn btn-default btn-xs" type="submit">
			<i class="fa fa-lg fa-pencil"></i>
			Edytuj
		</button>
	</form>
	<h4 class="list-group-item-heading"><?php echo $zadanie['tytul']; ?></h4>
	<p class="list-group-item-text"><?php echo $zadanie['opis']; ?></p>
<?php
	} 
?>
	
	
</li>