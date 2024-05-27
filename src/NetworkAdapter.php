<?php

/**
 * This is NetworkAdapter class to fetch the details about Physical NetworkAdapter
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class NetworkAdapter extends SysInfo
{
    private static string $componentName = 'nic';
    public static array $possibleValues = [];

    public static function details()
    {
        return parent::result(parent::prepCmd(self::$componentName));
    }

    public static function getAttributes(array $attrName)
    {
        return parent::getCustom(self::$componentName, $attrName);
    }
}
