<?php

/**
 * This is Battery class to fetch the details about system Battery
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class Battery extends SysInfo
{
  private static string $componentName = "";

  public static function details()
  {
    return null;
  }

  public static function getModel()
  {
    return null;
  }

  public static function getSerialNumber()
  {
    return null;
  }

  public static function getManufacturer()
  {
    return null;
  }
  public static function getAttributes(array $attrName = [])
  {
    return parent::getCustom(self::$componentName, $attrName);
  }
}
