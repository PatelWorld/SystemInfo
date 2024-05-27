<?php

/**
 * This is LogicalDrive class to fetch the details about Physical LogicalDrive
 * 
 * @author Mukesh Patel <mukesh_gam_m@yahoo.com>
 * 
 */

declare(strict_types=1);

namespace PatelWorld\SystemInfo;


use PatelWorld\SystemInfo\SysInfo;


class LogicalDrive extends SysInfo
{
    private static string $componentName = 'logicaldisk';
    public static array $possibleValues = [
        "Access",
        "Availability",
        "BlockSize",
        "Caption",
        "Compressed",
        "ConfigManagerErrorCode",
        "ConfigManagerUserConfig",
        "CreationClassName",
        "Description",
        "DeviceID",
        "DriveType",
        "ErrorCleared",
        "ErrorDescription",
        "FileSystem",
        "FreeSpace",
        "InstallDate",
        "LastErrorCode",
        "MaximumComponentLength",
        "MediaType",
        "Name",
        "NumberOfBlocks",
        "PNPDeviceID",
        "PowerManagementCapabilities",
        "PowerManagementSupported",
        "ProviderName",
        "Purpose",
        "QuotasDisabled",
        "QuotasIncomplete",
        "QuotasRebuilding",
        "Size",
        "Status",
        "StatusInfo",
        "SupportsDiskQuotas",
        "SupportsFileBasedCompression",
        "SystemCreationClassName",
        "SystemName",
        "VolumeDirty",
        "VolumeName",
        "VolumeSerialNumber",
    ];

    public static function details()
    {
        return parent::result(parent::prepCmd(self::$componentName));
    }

    public static function getAttributes(array $attrName = [])
    {
        return parent::getCustom(self::$componentName, $attrName);
    }
}
