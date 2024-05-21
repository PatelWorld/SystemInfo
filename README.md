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
    - [Example:](#example)
  - [Support](#support)
  - [Class and Methods](#class-and-methods)
    - [Disk Drive](#disk-drive)

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

Next, just call the method name statically on class. `ClassName::MethodName()`

### Example:

```php
use PatelWorld\SystemInfo\DiskDrive;

echo DiskDrive::diskCount(); //2
echo DiskDrive::getSerialNumber(); // Array
Array
(
    [0] => KINGSTON XAB400S374580X
    [1] => SW1000MP010-2WPX305
)
```

## Support

Currently, the System Information supports the following types:

- [DiskDrive](#disk-drive)



## Class and Methods
### Disk Drive
| Method | description |
| :--------|:--------|
| diskCount() | it return `int` where the value is count of total phycical disk available in machine |
| details() | it return `array` where the main array contains index array and each index contains the all possible information of disk(n). _n_ is the count of disk.|
| getModel() | it return `array` where the main array contains index array and each index contains the model number of n<sup>th</sup> element in the list of disk.|