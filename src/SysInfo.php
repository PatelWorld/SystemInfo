<?php

declare(strict_types=1);

namespace PatelWorld\SystemInfo;

class SysInfo
{
    public function __construct()
    {
        echo PHP_OS;
    }

    public static function commandOutput($command)
    {
        exec($command, $lines);
        return $lines;
    }

    public static function parseWmicOutput($wmicOutput)
    {
        $result = [];
        $currentItem = [];

        // Split the output into lines
        print_r($wmicOutput);
        // $lines = explode(PHP_EOL, $wmicOutput);

        foreach ($wmicOutput as $line) {
            $line = trim($line); // Remove any extra whitespace

            if (empty($line)) {
                // End of an item (object), add the current item to the result and reset
                if (!empty($currentItem)) {
                    $result[] = $currentItem;
                    $currentItem = [];
                }
            } else {
                // Split the line into key and value
                list($key, $value) = explode('=', $line, 2);
                $currentItem[$key] = $value;
            }
        }

        // Add the last item if it exists
        if (!empty($currentItem)) {
            $result[] = $currentItem;
        }

        return $result;
    }

    public static function toCamelCase($string)
    {
        // Remove any non-alphanumeric characters (including spaces)
        $string = preg_replace('/[^a-zA-Z0-9]+/', ' ', $string);

        // Convert the string to lowercase and then capitalize each word
        $string = ucwords(strtolower($string));

        // Remove spaces
        $string = str_replace(' ', '', $string);

        // Lowercase the first character
        $string = lcfirst($string);

        return $string;
    }
}
