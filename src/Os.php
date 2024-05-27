<?php

/**
 * This is Os class to fetch the details about Physical Os
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class Os extends SysInfo
{
  private static string $componentName = 'os';
  public static array $possibleValues = [];

  public static function details()
  {
    return parent::result(parent::prepCmd(self::$componentName));
  }

  public static function getBuildNumber()
  {
    return parent::parseResult(self::$componentName, "BuildNumber");
  }

  public static function getManufacture()
  {
    return parent::parseResult(self::$componentName, "Manufacturer");
  }

  public static function getSerialNumber()
  {
    return parent::parseResult(self::$componentName, "SerialNumber");
  }

  public static function getSystemDrive()
  {
    return parent::parseResult(self::$componentName, "SystemDrive");
  }

  public static function getAttributes(array $attrName)
  {
    return parent::getCustom(self::$componentName, $attrName);
  }
}
