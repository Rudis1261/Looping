<?php

// This is the control. How much memory is used to process the request
require("functions.inc.php");

function genReadFile($file) {
    $handle = fopen($file, 'r');
    try {
        while ($line = fgets($handle)) {
            yield $line;
        }
    } finally {
        fclose($handle);
    }
}

foreach (genReadFile("small.txt") as $line => $content) {
    if ($line > 10) break;
    echo $line . ":" . $content;
}

echo logTime("");
echo logTime("  [FILESIZE]           " . echoBytes(filesize('small.txt')));
printStatus(genReadFile("small.txt"));
