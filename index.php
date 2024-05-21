<?php

require_once "vendor/autoload.php";

use PatelWorld\SystemInfo\DiskDrive;
// use PatelWorld\SystemInfo\Ram;

echo "<pre/>";
// print_r(Disk::serialNumber());


// print_r(Disk::details());
print_r(DiskDrive::getModel());
print_r(DiskDrive::getSerialNumber());
// print_r(Disk::getSize());
print_r(DiskDrive::getDiskDetails());
