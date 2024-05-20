<?php

require_once "vendor/autoload.php";

use PatelWorld\SystemInfo\Disk;
use PatelWorld\SystemInfo\Ram;

echo "<pre/>";
print_r(Disk::serialNumber());


print_r(Disk::diskCount());
