<?php

/**
 * This is Usb class to fetch the details about Physical Usb
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class Usb extends SysInfo
{
  //wmic path CIM_LogicalDevice where "Description like 'USB%'" get Name, Manufacturer, Status
  private static string $componentName = 'path Win32_PnPEntity where "DeviceID like \'USB%\'"';

  public static array $possibleValues = [];

  public static function details()
  {
    return parent::result(parent::prepCmd(self::$componentName));
  }

  public static function getName()
  {
    return parent::parseResult(self::$componentName, "Name");
  }

  public static function getManufacture()
  {
    return parent::parseResult(self::$componentName, "Manufacturer");
  }

  public static function getAttributes(array $attrName)
  {
    return parent::getCustom(self::$componentName, $attrName);
  }
}
