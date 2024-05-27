<?php

/**
 * This is Cpu class to fetch the details about Processor
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class Cpu extends SysInfo
{
  private static string $componentName = 'cpu';

  public static function details()
  {
    return parent::result(parent::prepCmd(self::$componentName));
  }

  public static function getModel()
  {
    return parent::parseResult(self::$componentName, 'Model');
  }

  public static function getManufacturer()
  {
    return parent::parseResult(self::$componentName, "UpgradeMethod");
  }

  public static function getAttributes(array $attrName = [])
  {
    return parent::getCustom(self::$componentName, $attrName);
  }
}
