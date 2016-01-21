<?php
require 'functions.inc.php';
// Instantiate the iterator. Skipping Dots
$iter = new RecursiveDirectoryIterator("pictures", FilesystemIterator::SKIP_DOTS);

// Iterate over them as usual
$count = 1;
foreach (new RecursiveIteratorIterator($iter) as $item) {
    echo $count . ": " .  $item . PHP_EOL;
    $count++;
}
printStatus($iter);
