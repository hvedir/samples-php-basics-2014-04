<!doctype html>
<html>
	<body>
<?php
	if($valid = preg_match('/^[a-z]+$/i', $_GET['imie'])):
?>
		<h1>
		Witaj <?php echo $_GET['imie']; ?>
		<form style="float:right;color: red;" method="get" action="">
			<input type="hidden" name="imie" value="">
			<button type="submit">X</button>
		</form>
		</h1>
<?php
	else:
?>
		<form action="" method="get">
			<label>
				Wpisz imie
				<input type="text" name="imie" 
					value="<?php echo $_GET['imie']; ?>">
				<button type="submit">To ja:)</button>
			</label>
			<?php if (!$valid): ?>
			<span>
			 Zezwolone tylko litery
			</span>
			<?php endif; ?>
		</form>
<?php
	endif;
?>	
	</body>
</html>