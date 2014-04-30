<?php 
/**
 * Zapisujemy stan gry do pliku
 * @param type $data
 * @param type $filename
 */
function saveBoard($data, $filename) {
    $data = serialize($data);
    file_put_contents($filename, $data);
}

function loadBoard($filename) {
    $content = file_get_contents($filename);
    return empty($content)? array():unserialize($content);
}

function getNextChar($boardData) {
    return count($boardData)%2 ? 'O':'X';
}

$saveFile = __DIR__.'/savedGame';
$board = loadBoard($saveFile);

if (array_key_exists('reset', $_POST)) {
    unlink($saveFile);
}

//array_key_exists($board, $array)
if ('POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['numer_komorki'])) {
    $index = $_POST['numer_komorki'];
    // jezeli juz jest i sproba nadpisac
    if (isset($board[$index])) {
        $error = 'Cos poszlo nie tak :( <br> Sproba nadpisania $board['.$index.']';
    }
    else {
        $wartosc = getNextChar($board);
        $board[$index]= $wartosc;
        saveBoard($board, $saveFile);
    }
}




?><!doctype html>
<html>
	<head>
		<style type="text/css">
                    td {
                        position: relative;
                        overflow: hidden;
                    }
                    td > span {
                        text-align: center;
                        vertical-align: middle;
                        background: white;
                        z-index: 2;
                        display: inline-block;
                        width: 30px;
                        height: 30px;
                        line-height: 30px;
                        padding: 0;
                        margin: 0;
                        box-sizing: border-box;
                        cursor: pointer;
                    }
                    td > span:hover{
                        
                    }
                    .error {
                        color: red;
                    }
                    body td > span.forbidden {
                        background: black;
                        color: white;
                        cursor: not-allowed;
                    }
		</style>
                <script>
                    function makeMove (index) {
                        var input = document.getElementsByName('numer_komorki')[0];
                        input.value = index;
                        input.parentElement.submit();
                    }
                </script>
	</head>
	<body>
            <form method="POST" action="">
                <input type="hidden" name="numer_komorki" value="">
            </form>
            <?php if (9 === count($board)): ?>
            <form action="" method="POST"><input type="submit" name="reset" value="Reset"></form>
            <?php endif; ?>
            <table border="1">
                <?php for ($i = 0; $i < 3; ++$i): ?>
                <tr>
                    <?php for ($j = 0,$idx = ($i*3+$j); $j < 3; ++$j, $idx = ($i*3+$j)): ?>
                    <td>
                        <?php if(array_key_exists($idx, $board)): ?>
                            <span class="forbidden">
                                <?php echo $board[$idx]; ?>
                            </span>
                        <?php  else: ?>
                            <span onclick="makeMove(<?php echo $idx; ?>)">
                                <?php echo count($board)%2 ? '0':'X'; ?>
                            </span>
                        <?php endif; ?>
                    </td>
                    <?php endfor; ?>
                </tr>
                <?php endfor; ?>
            </table>
            <?php echo isset($error)?'<p class="error">'.$error.'</p>':''; ?>
	</body>
</html>