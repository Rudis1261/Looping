<?php

// This is the control. How much memory is used to process the request
require("functions.inc.php");

function logger($fileName) {
    $fileHandle = fopen($fileName, 'a');
    while (true) {
        fwrite($fileHandle, yield . PHP_EOL);
    }
}

$logger = logger(__DIR__ . '/output.log');
$logger->send(date('r', time()) . ' How');
$logger->send(date('r', time()) . ' Now');
$logger->send(date('r', time()) . ' Brown');
$logger->send(date('r', time()) . ' Cow');
printStatus($logger);
