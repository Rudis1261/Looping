<?php

set_time_limit(600);
ini_set('memory_limit','5G');
date_default_timezone_set('Africa/Johannesburg');
$startTime = microtime(true);

// Size to see the performance difference between vanilla PHP and Generators
$rangeSize = 10000000;
//$rangeSize = 100000;
//$rangeSize = 1000;

function printStatus($var) {
    memoryUsage();
    execTime();
    checkGenerator($var);
}

function checkGenerator($var) {
    echo logTime("[TYPE]\t\t\t" . gettype($var));
    echo logTime("[GENERATOR]\t\t" . (int)($var instanceof Iterator));
}

function memoryUsage($message = "") {
    $usage = (memory_get_peak_usage(true) / 1024 / 1024);
    echo logTime("[PEAK_MEMORY_USAGE]\t" . $usage . "MB");
}

function execTime() {
    global $startTime;
    $endTIme = microtime(true);
    echo logTime("[EXECUTION_TIME]\t\t" . Round($endTIme - $startTime, 2) . "s");
}

function logTime($line = "") {
    return date('[d/M/Y G:i:s]', time()) . $line . PHP_EOL;
}