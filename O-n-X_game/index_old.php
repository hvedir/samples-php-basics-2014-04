<!doctype html>
<html>
	<head>
		<style type="text/css">
			td > span,
			td button {
				font-size: 50px;
				display: inline-block;
				width: 1.2em;
				height: 1.2em;
				padding: 0;
				margin: 0;
			}
			td > span {
				background-color: darkgray;
				color: white;
			}
			td button {
				background-color: lightgray;
				color: black;
				outline: none 0 transparent;
				border: none 0 transparent;
			}			
			td button:hover {
				background-color: white;
				color: darkgray;
			}			
		</style>
	</head>
	<body>
		<table border="1">
		<?php
			$i = 0;
			$plik_z_zapisem = __DIR__.'/zapis_gry.txt';
			$macierzWymiany = array(
					'X' => 'O',
					'O' => 'X',
			);
			$dane = unserialize(file_get_contents($plik_z_zapisem));
			if (!$dane) {
				$dane = array (
						'mapa' => array(),
						'nastepnySymbol' => 'X',
				);
				file_put_contents($plik_z_zapisem, serialize($dane));
			}
			if($_POST['index']) {
				$dane['mapa'][$_POST['index']] = $dane['nastepnySymbol']; 
				$dane['nastepnySymbol'] = $macierzWymiany[$dane['nastepnySymbol']];
				file_put_contents($plik_z_zapisem, serialize($dane));
			}
			$templatkaFormularza = ''.
				'<form method="POST">'.
					'<input type="hidden" name="index" value="%d">'.
					'<button type="submit">%s</button>'.
				'</form>';
			
			
			for (;$i < 3; ++$i) {
				echo '<tr>';
				for ($j = 0; $j < 3; ++$j){
					$indeks = ($i*3+$j);
					echo '<td>';
					if (isset($dane['mapa'][$indeks])) {
						echo '<span>'.$dane['mapa'][$indeks].'</span>';
					}else {
						echo sprintf($templatkaFormularza, $indeks, $dane['nastepnySymbol']);
					}
					
					echo '</td>';
				}
				echo '</tr>';
			}
		?>
		</table>
	</body>
</html>