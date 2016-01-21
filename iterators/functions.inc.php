<?php

set_time_limit(600);
define('START_TIME', microtime(true));
ini_set('memory_limit','5G');
date_default_timezone_set('Africa/Johannesburg');

require_once 'args.php';
require_once 'config.php';
require_once 'class.colors.php';

function printOutput() {
    return (bool)arguments('output');
}
$printOutput = printOutput();

define('COLS', 40);

function printStatus($var) {
    echo logTime("");
    memoryUsage();
    checkGenerator($var);
    execTime();
    echo logTime("");
}

function checkGenerator($var) {
    echo logTime("  [SIZE]               " . sizeof($var));
    echo logTime("  [TYPE]               " . gettype($var));
    echo logTime("  [GENERATOR]          " . (($var instanceof Generator) ? "YES" : "NO"));
    echo logTime("  [ITERATOR]           " . (($var instanceof Iterator) ? "YES" : "NO"));
}

function memoryUsage($message = "") {
    echo logTime("  [PEAK_MEMORY_USAGE]  " . echoBytes(memory_get_peak_usage()));
    echo logTime("  [MEMORY_USAGE]       " . echoBytes(memory_get_usage()));
}

function execTime() {
    echo logTime("  [EXECUTION_TIME]     " . Round(microtime(true) - START_TIME, 2) . "s");
}

function logTime($line = "", $fgColor = false, $bgColor = false) {
    if (empty($fgColor)) {
        $fgColor = 'black';
    }

    if (empty($bgColor)) {
        $bgColor = 'green';
    }

    $colors = new Colors();
    $time = date('[d/M/Y G:i:s]', time()) . "";
    $line = (!empty($line)) ? $time . $line : "";
    if (strlen($line) < (COLS + strlen($time))) {
        $padding = str_repeat(" ", (COLS + strlen($time)) - strlen($line));
        $line .= $padding;
    }
    $output = $colors->getColoredString("  " . $line, $fgColor, $bgColor);
    return $output . PHP_EOL;
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
