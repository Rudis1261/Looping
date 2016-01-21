<?php require("functions.inc.php"); ?>

<?php
$range = range(1, 100000000);
foreach ($range as $value) {
    if ($value % 1000000 !== 0) continue;
    echo $value . PHP_EOL;
}

printStatus($range);