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

foreach (genReadFile("large.txt") as $line => $content) {
    if ($line > 10) break;
    echo $line . ":" . $content;
}

echo logTime("");
echo logTime("  [FILESIZE]           " . echoBytes(filesize('large.txt')));
printStatus(genReadFile("large.txt"));
