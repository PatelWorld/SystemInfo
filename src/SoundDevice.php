<?php

/**
 * This is SoundDevice class to fetch the details about Physical SoundDevice
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class SoundDevice extends SysInfo
{
  private static string $componentName = 'sounddev';
  public static array $possibleValues = [];

  public static function details()
  {
    return parent::result(parent::prepCmd(self::$componentName));
  }

  public static function getProductName()
  {
    return parent::parseResult(self::$componentName, "ProductName");
  }

  public static function getManufacture()
  {
    return parent::parseResult(self::$componentName, "Manufacturer");
  }

  public static function getStatus()
  {
    return parent::parseResult(self::$componentName, "Status");
  }

  public static function getAttributes(array $attrName)
  {
    return parent::getCustom(self::$componentName, $attrName);
  }
}
