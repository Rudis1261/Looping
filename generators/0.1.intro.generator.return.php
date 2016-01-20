<?php require("functions.inc.php"); ?>

<?php
function sass() {
    return ["Ain't nobody got time for that"];
    // Never gets past the first hit return
    return ["#yolo"];
    return ["Awww Shit"];
    return ["Nah Mean?"];
    return ["You know it son"];
}

foreach(sass() as $sass) {
    echo $sass . PHP_EOL;
}

printStatus(sass());