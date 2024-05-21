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


class MemoryChip extends SysInfo
{
  public static function diskCount(): int
  {
    return count(array_filter(parent::commandOutput("wmic diskdrive get deviceid /format:list"), function ($r) {
      return !empty($r);
    }));
  }

  public static function details()
  {
    return parent::parseWmicOutput(parent::commandOutput("WMIC cpu get /format:list"));
  }

  public static function getModel()
  {
    return parent::parseWmicOutput(parent::commandOutput("WMIC diskdrive get Model /format:list"));
  }

  public static function getSerialNumber()
  {
    return parent::result("WMIC diskdrive get SerialNumber /format:list");
  }

  public static function getSize()
  {
    return parent::result("WMIC diskdrive get Size /format:list");
  }

  public static function getPartitionsCount()
  {
    return parent::result("WMIC diskdrive get Partitions /format:list");
  }
  public static function getManufacturer()
  {
    return parent::result("WMIC diskdrive get Caption /format:list");
  }

  public static function getDiskDetails()
  {
    return parent::result("wmic logicaldisk get DeviceID,VolumeName,FileSystem,Size,FreeSpace /format:list");
  }

  public static function getWindowDiskDetails()
  {
    $windowsDrive = parent::result("WMIC os get SystemDrive /format:list");
    if (count($windowsDrive) > 0 && isset($windowsDrive[0]['SystemDrive'])) {
      $windowsDrive = $windowsDrive[0]['SystemDrive'];
    }

    return parent::result("wmic logicaldisk where \"DeviceID='$windowsDrive'\" get DeviceID,VolumeName,FileSystem,Size,FreeSpace /format:list")[0];
  }
}
