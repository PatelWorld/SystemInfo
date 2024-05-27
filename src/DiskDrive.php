<?php

/**
 * This is Disk class to fetch the details about Physical disk as well as logical disk
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class DiskDrive extends SysInfo
{
    private static string $componentName = 'diskdrive';
    public static function diskCount(): int
    {
        // return parent::result();
        return count(array_filter(parent::commandOutput(parent::prepCmd(self::$componentName, ["deviceid"])), function ($r) {
            return !empty($r);
        }));
    }

    public static function details()
    {
        return parent::result(parent::prepCmd(self::$componentName));
    }

    public static function getModel()
    {
        return array_map(function ($r) {
            return $r['Model'];
        }, parent::result(parent::prepCmd(self::$componentName, ["Model"])));
    }

    public static function getSerialNumber()
    {
        return array_map(function ($r) {
            return $r['SerialNumber'];
        }, parent::result(parent::prepCmd(self::$componentName, ["SerialNumber"])));
    }

    public static function getSize()
    {
        return parent::parseResult(self::$componentName, "Size");
    }

    public static function getPartitionsCount()
    {
        return parent::parseResult(self::$componentName, "Partitions");
    }
    public static function getManufacturer()
    {
        return parent::parseResult(self::$componentName, "Caption");
    }

    public static function getDiskDetails()
    {
        return parent::result(parent::prepCmd("logicaldisk", ["DeviceID", "VolumeName", "FileSystem", "Size", "FreeSpace"]));
    }

    public static function getWindowDiskDetails()
    {
        $windowsDrive = parent::parseResult("os", "SystemDrive");
        return parent::result("wmic logicaldisk where \"DeviceID='$windowsDrive[0]'\" get DeviceID,VolumeName,FileSystem,Size,FreeSpace /format:list")[0];
    }

    public static function getAttributes(array $attrName = [])
    {
        return parent::getCustom(self::$componentName, $attrName);
    }
}
