<?php require("functions.inc.php"); ?>

<?php
function sass() {
    yield "Ain't nobody got time for that";
    yield "#yolo";
    yield "Awww Shit";
    yield "Nah Mean?";
    yield "You know it son";
}

foreach(sass() as $sass) {
    echo $sass . PHP_EOL;
}

printStatus(sass());