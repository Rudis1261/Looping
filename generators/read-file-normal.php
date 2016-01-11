<?php

// This is the control. How much memory is used to process the request
require("functions.inc.php");

$read = file_get_contents($file);
$lines = explode("\n", $read);
foreach($lines as $index => $line) {
    if ($index % 1000 == 0 && $printOutput) {
        echo logTime("Read test line $index: " . substr($line, 0, 30));
    }
}

printStatus($lines);