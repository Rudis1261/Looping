<?php
require 'functions.inc.php';
// Instantiate the iterator. Skipping Dots
$iter = new RecursiveDirectoryIterator("music", FilesystemIterator::SKIP_DOTS);

// Iterate over them as usual
foreach (new RecursiveIteratorIterator($iter) as $item) {
    echo $item . PHP_EOL;
}
printStatus($iter);
