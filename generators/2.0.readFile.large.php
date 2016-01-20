<?php
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

foreach (genReadFile("large_file.txt") as $line => $content) {
    if ($line > 10) break;
    echo $line . ":" . $content;
}

printStatus(genReadFile("large_file.txt"));
