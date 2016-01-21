<?php
require 'functions.inc.php';
$iter = new RecursiveDirectoryIterator("music", FilesystemIterator::SKIP_DOTS);

foreach ($iter as $item => $dir) {
    echo $item . PHP_EOL;
}
printStatus($iter);
