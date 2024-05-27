<?php

/**
 * This is Disk class to fetch the details about Physical disk as well as logical disk
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */


declare(strict_types=1);

namespace PatelWorld\SystemInfo;

class SysInfo
{
    public static function commandOutput(string $command)
    {
        // $command = "WMIC $componentName get /format:$format";
        // $command = self::prepCmd($componentName, $detailsArray, $format);
        exec($command, $lines);
        return $lines;
    }

    public static function prepCmd(string $componentName, array $detailsArray = [], string $format = "list")
    {
        $details = implode(", ", $detailsArray);
        $cmd = "WMIC $componentName get $details /format:$format";
        // echo $cmd;
        return $cmd;
    }

    public static function parseWmicOutput($wmicOutput)
    {
        $result = [];
        $currentItem = [];

        // Split the output into lines
        // print_r($wmicOutput);
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
                $currentItem[$key] = trim($value);
            }
        }

        // Add the last item if it exists
        if (!empty($currentItem)) {
            $result[] = $currentItem;
        }

        return $result;
    }

    public static function parseResult(string $component, string $attributeName)
    {
        $command = self::prepCmd($component, [$attributeName]);
        $commandOutput = self::result($command);
        $actualResult = [];
        if (!empty($commandOutput) && count($commandOutput) > 0) {
            foreach ($commandOutput as $eachRec) {
                if (isset($eachRec[$attributeName])) {
                    $actualResult[] = trim($eachRec[$attributeName]);
                }
            }
        }
        return $actualResult;
    }

    public static function result($cmd)
    {
        return self::parseWmicOutput(self::commandOutput($cmd));
    }

    protected static function getCustom(string $componentName, array $attrArr = [])
    {
        return self::result(self::prepCmd($componentName, $attrArr));
    }
}
