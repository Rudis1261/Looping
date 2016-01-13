<?php
require 'functions.inc.php';

$dirs = new RecursiveDirectoryIterator('music', FilesystemIterator::SKIP_DOTS);
foreach($dirs as $filename => $dir) {
    echo $filename . PHP_EOL;
}

printStatus($dirs);
