<?php

// This is the control. How much memory is used to process the request
require("functions.inc.php");

$range = range(0, $rangeSize);
$printOutput = printOutput();
foreach($range as $index) {
    if ($index % ($rangeSize / 10) == 0 && $printOutput) {
        echo logTime("Range test $index");
    }
}

printStatus($range);