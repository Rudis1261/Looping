<?php

set_time_limit(600);
define('START_TIME', microtime(true));
ini_set('memory_limit','5G');
date_default_timezone_set('Africa/Johannesburg');

require_once 'args.php';
require_once 'config.php';

function printOutput() {
    return (bool)arguments('output');
}
$printOutput = printOutput();

function printStatus($var) {
    echo logTime(str_repeat("=", 50));
    memoryUsage();
    checkGenerator($var);
    execTime();
    echo logTime(str_repeat("=", 50));
}

function checkGenerator($var) {
    echo logTime("[SIZE]\t\t\t" . sizeof($var));
    echo logTime("[TYPE]\t\t\t" . gettype($var));
    echo logTime("[GENERATOR]\t\t" . (($var instanceof Iterator) ? "YES" : "NO"));
}

function memoryUsage($message = "") {
    echo logTime("[PEAK_MEMORY_USAGE]\t" . echoBytes(memory_get_usage()));
}

function execTime() {
    echo logTime("[EXECUTION_TIME]\t" . Round(microtime(true) - START_TIME, 2) . "s");
}

function logTime($line = "") {
    return date('[d/M/Y G:i:s]', time()) . "\t" . $line . PHP_EOL;
}

function echoBytes($size) {
    $unit = ['B','KB','MB','GB','TB','PB'];
    return round(
        $size / pow(
            1024, (
                $i = floor(
                    log( $size, 1024 )
                )
            )
        ),
        2
    ) . $unit[$i];
}