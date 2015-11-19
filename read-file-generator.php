<?php

// This is the control. How much memory is used to process the request
require("functions.inc.php");

function getLines($file) {
    $f = fopen($file, 'r');
    try {
        while ($line = fgets($f)) {
            yield $line;
        }
    } finally {
        fclose($f);
    }
}

$lines = getLines($file);
foreach($lines as $index => $line) {
    if ($index % 1000 == 0 && $printOutput) {
        echo logTime("Generator read test line $index: " . substr($line, 0, 30));
    }
}

printStatus($lines);