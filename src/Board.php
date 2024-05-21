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


class Disk extends SysInfo
{
  public static function diskCount(): int
  {
    return count(array_filter(parent::commandOutput("wmic baseboard get deviceid /format:list"), function ($r) {
      return !empty($r);
    }));
  }

  public static function details()
  {
    return parent::parseWmicOutput(parent::commandOutput("wmic baseboard list /format:list"));
  }

  public static function getModel()
  {
    return parent::parseWmicOutput(parent::commandOutput("WMIC baseboard get Model /format:list"));
  }

  public static function getSerialNumber()
  {
    return parent::result("WMIC baseboard get SerialNumber /format:list");
  }

  public static function getSize()
  {
    return parent::result("WMIC baseboard get Size /format:list");
  }

  public static function getPartitionsCount()
  {
    return parent::result("WMIC baseboard get Partitions /format:list");
  }
  public static function getManufacturer()
  {
    return parent::result("WMIC baseboard get Caption /format:list");
  }
}
