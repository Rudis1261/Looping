<?php require("functions.inc.php"); ?>

<?php
$range = range(1, 1000);
foreach ($range as $value) {
    if ($value % 100 !== 0) continue;
    echo $value . PHP_EOL;
}

printStatus($range);