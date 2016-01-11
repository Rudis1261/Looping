<?php
/**
 * Used to parse the command line variables
 * Usage:
 *     Given
 *         php index.php -env local
 *     Running
 *         echo arguments('env');
 *     Returns
 *         "local"
 *
 * @param  string $needle   Looks for a specific command line variable
 * @return mixed            Returns either false the matched string of the next index
 */
function arguments($needle)
{
    global $argc, $argv;
    if(empty($needle) || empty($argc) || count($argv) <= 1){
        return false;
    }

    // Unset the script name
    unset($argv[0]);

    // Find the argument provided, either with or without a -
    $withHyphen = array_search('-'.$needle, $argv);
    $withoutHyphen = array_search($needle, $argv);
    $key = null;

    // Set the key to the matched argument
    if($withoutHyphen !== false){
        $key = $withoutHyphen;
    }elseif($withHyphen !== false){
        $key = $withHyphen;
    }

    // Find the next value provided in the array of arguments.
    if(!empty($key) && !empty($argv[$key+1])){
        return $argv[$key+1];
    }

    // Key not found, try and find it in key=value pair
    if(empty($key)){
        foreach($argv as $args){

            // Does it contain a = separator
            if(!strstr($args, '=')){
                continue;
            }

            // Explode into key value pair and test for the string
            $keyValuePair = explode('=', $args);
            if(ltrim($keyValuePair[0], '-') == $needle){
                return $keyValuePair[1];
            }
        }
    }

    return false;
}