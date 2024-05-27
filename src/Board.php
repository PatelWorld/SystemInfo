<?php

/**
 * This is Board class to fetch the details about Physical mother board
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class Board extends SysInfo
{
  private static string $componentName = "baseboard";
  public static function details()
  {
    return parent::result(parent::prepCmd(self::$componentName));
  }

  public static function getModel()
  {
    return parent::parseResult(self::$componentName, 'Model');
  }

  public static function getSerialNumber()
  {
    return parent::parseResult(self::$componentName, "SerialNumber");
  }

  public static function getManufacturer()
  {
    return parent::parseResult(self::$componentName, "Caption");
  }

  public static function getAttributes(array $attrName = [])
  {
    return parent::getCustom(self::$componentName, $attrName);
  }
}
