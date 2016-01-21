<?php require("functions.inc.php"); ?>

<?php
function countMePlenty() {
    echo "#YOLO" . PHP_EOL; // <=== Note how this is only returned once
    for ($i = 1; $i <= 100000000; $i++) {
        yield $i; // <=== But yield returns a new values on every iteration
    }
}

$generator = countMePlenty();
foreach ($generator as $value) {
    if ($value % 1000000 !== 0) continue;
    echo $value . PHP_EOL;
}

printStatus($generator);