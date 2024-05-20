<?php

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;

class Disk extends SysInfo
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function diskCount(): int
    {
        return count(array_filter(parent::commandOutput("wmic diskdrive get deviceid /format:list"), function ($r) {
            return !empty($r);
        }));
    }

    public static function getPhysicalDrive()
    {
        
    }

    public static function getDiskSize($path = "/")
    {
        $result = array();
        $result['size'] = 0;
        $result['free'] = 0;
        $result['used'] = 0;

        if (PHP_OS == 'WINNT') {
            $lines = null;
            $lines = parent::commandOutput('wmic logicaldisk get FreeSpace^,Name^,Size /Value');
            foreach ($lines as $index => $line) {
                if ($line != "Name=$path") {
                    continue;
                }
                $result['free'] = explode('=', $lines[$index - 1])[1];
                $result['size'] = explode('=', $lines[$index + 1])[1];
                $result['used'] = $result['size'] - $result['free'];
                break;
            }
        } else {
            $lines = null;
            exec(sprintf('df /P %s', $path), $lines);
            foreach ($lines as $index => $line) {
                if ($index != 1) {
                    continue;
                }
                $values = preg_split('/\s{1,}/', $line);
                $result['size'] = $values[1] * 1024;
                $result['free'] = $values[3] * 1024;
                $result['used'] = $values[2] * 1024;
                break;
            }
        }
        return $result;
    }
    public static function getFreeSpace()
    {
    }

    public static function getUsedSpace()
    {
    }

    public static function getTotalSpace()
    {
    }

    public static function serialNumber()
    {
        return "sfafasf";
    }
}
