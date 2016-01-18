<?php

// This is the control. How much memory is used to process the request
require("functions.inc.php");

$read = file_get_contents("large_file.txt");
$lines = explode("\n", $read);
foreach($lines as $line => $content) {
    if ($line > 10) {
        break;
    }
    echo $line . ":" . $content . PHP_EOL;
}

printStatus($lines);
