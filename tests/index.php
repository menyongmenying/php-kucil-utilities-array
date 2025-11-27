<?php

use Kucil\Components\Utilities\ArrayUtils;

require_once __DIR__ . '/../vendor/autoload.php';


$array = [
    'a' => 'aaaaaaaaaa',
    'b' => 'bbbbbbbbbb',
    'c' => 'cccccccccc',
    'd' => 'dddddddddd',
];
var_dump(ArrayUtils::rename($array, ['a' => 'f']));
var_dump(ArrayUtils::rename($array, ['b' => 'd']));