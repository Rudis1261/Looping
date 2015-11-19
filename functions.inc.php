<?php

set_time_limit(600);
ini_set('memory_limit','5G');
date_default_timezone_set('Africa/Johannesburg');
$startTime = microtime(true);

require_once('args.php');
require_once('config.php');

function printOutput() {
    return (bool)arguments('output');
}
$printOutput = printOutput();

function printStatus($var) {
    echo logTime("");
    echo logTime(str_repeat("=", 50));
    memoryUsage();
    execTime();
    checkGenerator($var);
    echo logTime(str_repeat("=", 50));
}

function checkGenerator($var) {

    echo logTime("[SIZE]\t\t\t" . sizeof($var));
    echo logTime("[TYPE]\t\t\t" . gettype($var));
    $generator = ($var instanceof Iterator) ? "YES" : "NO";
    echo logTime("[GENERATOR]\t\t" . $generator);
}

function memoryUsage($message = "") {
    $usage = (memory_get_peak_usage(true) / 1024 / 1024);
    echo logTime("[PEAK_MEMORY_USAGE]\t" . $usage . "MB");
}

function execTime() {
    global $startTime;
    $endTIme = microtime(true);
    echo logTime("[EXECUTION_TIME]\t" . Round($endTIme - $startTime, 2) . "s");
}

function logTime($line = "") {
    return date('[d/M/Y G:i:s]', time()) . "\t" . $line . PHP_EOL;
}