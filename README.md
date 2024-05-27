# System Information

System Info is a PHP library that gives the system related information based on WMIC command.

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

---

## Table of Contents

- [System Information](#system-information)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Basic Usage](#basic-usage)
    - [Namespacing](#namespacing)
    - [Examples](#examples)
  - [Class and Methods](#class-and-methods)
    - [Battery](#battery)
    - [Board](#board)
    - [Cpu](#cpu)
    - [Disk Drive](#disk-drive)
    - [Graphics card](#graphics-card)
    - [Logical Drive](#logical-drive)
    - [Memory Chip (RAM)](#memory-chip-ram)
    - [Network Adapter](#network-adapter)
    - [OS](#os)
    - [Sound Device](#sound-device)
    - [USB](#usb)

---

## Installation

```bash
$ composer require patelworld/system-info
```

## Basic Usage

### Namespacing

The System Information library is under `PatelWorld\SystemInfo` namespace.

Once you have installed the System Information library, fetching system information is really simple.

First, If you are working in a fremework then create a new instance of the desired type and import the related class on top of the php file with `use statement`. Example given below.
The class are availbale to use statically.

Next, just call the method name statically on class. `ClassName::methodName()`

### Examples

```php
use PatelWorld\SystemInfo\DiskDrive;

echo DiskDrive::diskCount(); //2
print_r(DiskDrive::getSerialNumber()); // Array
Array
(
    [0] => KINGSTON XAB400S374580X
    [1] => SW1000MP010-2WPX305
)
```

## Class and Methods

### Battery

```php
use PatelWorld\SystemInfo\Battery;

print_r(Battery::details());
print_r(Battery::getSize());
print_r(Battery::getPartNumber());
print_r(Battery::getAttributes(["Name","Description"]));
```

### Board

```php
use PatelWorld\SystemInfo\Board;

print_r(Board::details());
print_r(Board::getModel());
print_r(Board::getSerialNumber());
print_r(Board::getManufacturer());
print_r(Board::getAttributes(["Name","Description"]));
```

### Cpu

```php
use PatelWorld\SystemInfo\Cpu;

print_r(Cpu::details());
print_r(Cpu::getModel());
print_r(Cpu::getManufacturer());
print_r(Cpu::getAttributes(["Name","Description"]));
```

### Disk Drive

```php
use PatelWorld\SystemInfo\DiskDrive;

print_r(DiskDrive::diskCount());
print_r(DiskDrive::details());
print_r(DiskDrive::getModel());
print_r(DiskDrive::getSerialNumber());
print_r(DiskDrive::getSize());
print_r(DiskDrive::getPartitionsCount());
print_r(DiskDrive::getManufacturer());
print_r(DiskDrive::getDiskDetails());
print_r(DiskDrive::getWindowsDiskDetails());
print_r(DiskDrive::getAttributes(["Name","Description"]));

```

| Method      | return type | description                                                                                                                                            |
| :---------- | :---------- | :----------------------------------------------------------------------------------------------------------------------------------------------------- |
| diskCount() | `int`       | it return `int` where the value is count of total phycical disk available in machine                                                                   |
| details()   | `array`     | it return `array` where the main array contains index array and each index contains the all possible information of disk(n). _n_ is the count of disk. |
| getModel()  | `array`     | it return `array` where the main array contains index array and each index contains the model number of n<sup>th</sup> element in the list of disk.    |

### Graphics card

```php
use PatelWorld\SystemInfo\GraophicsCard;

print_r(GraophicsCard::details());
print_r(GraophicsCard::getModel());
print_r(GraophicsCard::getManufacturer());
print_r(GraophicsCard::getAttributes(["Name","Description"]));

```

### Logical Drive

```php
use PatelWorld\SystemInfo\LocicalDrive;

print_r(LocicalDrive::details());
print_r(LocicalDrive::getAttributes(["Name","Description"]));
```

### Memory Chip (RAM)

```php
use PatelWorld\SystemInfo\MemoryChip;

print_r(MemoryChip::details());
print_r(MemoryChip::getSize());
print_r(MemoryChip::getPartNumber());
print_r(MemoryChip::getAttributes(["Name","Description"]));
```

### Network Adapter

```php
use PatelWorld\SystemInfo\NetworkAdapter;

print_r(NetworkAdapter::details());
print_r(NetworkAdapter::getAttributes(["Name","Description"]));
```

### OS

```php
use PatelWorld\SystemInfo\Os;

print_r(Os::details());
print_r(Os::getBuildNumber());
print_r(Os::getManufacturer());
print_r(Os::getSerialNumber());
print_r(Os::getSystemDrive());
print_r(Os::getAttributes(["Name","Description"]));
```

### Sound Device

```php
use PatelWorld\SystemInfo\SoundDevice;

print_r(SoundDevice::details());
print_r(SoundDevice::getProductName());
print_r(SoundDevice::getManufacturer());
print_r(SoundDevice::getStatus());
print_r(SoundDevice::getAttributes(["Name","Description"]));
```

### USB

```php
use PatelWorld\SystemInfo\Usb;

print_r(Usb::details());
print_r(Usb::getName());
print_r(Usb::getManufacturer());
print_r(Usb::getAttributes(["Name","Description"]));
```
