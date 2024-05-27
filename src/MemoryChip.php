<?php

/**
 * This is MemoryChip class to fetch the details about Physical MemoryChip
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class MemoryChip extends SysInfo
{
  private static string $componentName = 'memorychip';
  public static array $possibleValues = [
    "Attributes",
    "BankLabel",
    "Capacity",
    "Caption",
    "ConfigManagerErrorCode",
    "ConfigManagerUserConfig",
    "CreationClassName",
    "DataWidth",
    "Description",
    "DeviceLocator",
    "FormFactor",
    "HotSwappable",
    "InstallDate",
    "InterleaveDataDepth",
    "InterleavePosition",
    "Manufacturer",
    "MaxVoltage",
    "MemoryType",
    "MinVoltage",
    "Model",
    "Name",
    "OtherIdentifyingInfo",
    "PartNumber",
    "PositionInRow",
    "PoweredOn",
    "Removable",
    "Replaceable",
    "SerialNumber",
    "SKU",
    "SMBIOSMemoryType",
    "Speed",
    "Status",
    "Tag",
    "TotalWidth",
    "TypeDetail",
    "Version",
  ];

  public static function details()
  {
    return parent::result(parent::prepCmd(self::$componentName));
  }

  public static function getSize()
  {
    return parent::parseResult(self::$componentName, "Capacity");
  }
  public static function getPartNumber()
  {
    return parent::parseResult(self::$componentName, "PartNumber");
  }

  public static function getAttributes(array $attrName = [])
  {
    return parent::getCustom(self::$componentName, $attrName);
  }
}
