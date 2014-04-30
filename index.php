<!doctype html>
<html><?php
if (($src = $_GET['src']) && file_exists($src = __DIR__.$src)) {
?> <head>
        <meta charset="UTF-8">
        <title>Code browser</title>
        <link rel="stylesheet" href="vendor/highlight.min.css">
        <link rel="stylesheet" href="vendor/code-explorer.css">
        <script src="./vendor/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
    </head>
    <body>
        <pre><code class="css js php html">
<?php       echo htmlspecialchars(file_get_contents($src)); ?>
        </code></pre>
    </body>
</html>
<?php
exit(0);
}


$listing = array();

function dirListing($dirPath, $uriPrefix, &$filesArray) {
    $resource = opendir($dirPath);
    while ($filename = readdir($resource)) {
        if (preg_match('@(^\.|vagrant)@i', $filename)) {
            continue;
        }
        $fileData = array (
            'name' => $filename,
            'uri' => $uriPrefix.'/'.$filename,
        );
        if (is_dir($dirPath.'/'.$filename)) {
            $fileData ['children'] = array();
            dirListing($dirPath.'/'.$filename, $fileData['uri'], $fileData ['children']);
        }
        $filesArray []= $fileData;
    }
}

function renderList ($list) {
    foreach ($list as $item) {
        $hasChildren = isset($item['children']) && count($item['children']);
        echo '<li'.($hasChildren?' class="collapsed"':'').'>';
        if ($hasChildren) {
            echo '<a class="expand-btn" href="#" onclick="toggleDir(this);return false;"><span>[<span class="sign">+</span>]</span> '.$item['name'].' <span>]</span></a>';
            echo '<ul>';
            renderList($item['children']);
            echo '</ul>';
        }
        else {
            echo '<a href="/index.php?src='.$item['uri'].'" target="content">'.$item['name'].'</a>'.
                '<a class="enter-direct" title="Open on Web-Server" href="'.$item['uri'].'" target="_blank">&#9760;</a>';
        }
        echo '</li>';
    }
}

// grab directory tree
dirListing(__DIR__, '', $listing);

?>  <head>
        <meta charset="UTF-8">
        <title>Source code explorer</title>
        <link rel="stylesheet" href="vendor/code-explorer.css">
        <style type="text/css">

        </style>
        <script>
        function toggleDir(el){
            if (el.parentElement.classList.contains('collapsed')) {
                el.parentElement.classList.remove('collapsed');
                el.firstChild.firstChild.innerHTML = '-';
            }
            else {
                el.parentElement.classList.add('collapsed');
                el.firstChild.firstChild.innerHTML = '+';
            }
        } 
        </script>
    </head>
    <body>
        <ul class="tree-panel">
        <?php
            renderList($listing);
        ?>
        </ul>
        <div class="content">
            <iframe name="content" src="" />
        </div>
    </body>
</html>