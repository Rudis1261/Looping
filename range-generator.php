<?php

// This is the control. How much memory is used to process the request
require("functions.inc.php");

function xrange($start, $end, $step = 1) {
    for ($i = $start; $i <= $end; $i += $step) {
        yield $i;
    }
}

$range = xrange(0, $rangeSize);
foreach($range as $index) {
    if ($index % ($rangeSize / 10) == 0) {
        echo logTime("Generator range test $index");
    }
}

printStatus($range);