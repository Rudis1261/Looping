<?php
require 'functions.inc.php';
$items = explode(':', 'a:b:c:d:e:f:g:h:i:j:k:l:m:n:o:p:q:r:s:t:u:v:w:x:y:z');
$iterator = new ArrayIterator($items);

foreach($items as $key => $value) {
    if ($key % 5 == 0) {
        echo "${key} => ${value}" . PHP_EOL;
    }
}
printStatus($items);

foreach($iterator as $key => $value) {
    if ($key % 5 == 0) {
        echo "${key} => ${value}" . PHP_EOL;
    }
}
printStatus($iterator);