<?php

/**
 * This is GraphicesCard class to fetch the details about GraphicesCard
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class GraphicsCard extends SysInfo
{
    private static string $componentName = 'path win32_VideoController';

    public static function details()
    {
        return parent::result(parent::prepCmd(self::$componentName));
    }

    public static function getModel()
    {
        return parent::parseResult(self::$componentName, 'Name');
    }

    public static function getManufacturer()
    {
        return parent::parseResult(self::$componentName, "AdapterCompatibility");
    }

    public static function getAttributes(array $attrName = [])
    {
        return parent::getCustom(self::$componentName, $attrName);
    }
}
