<?php


$arr1 = ['el1', 'el2', 'el3'];


$arr2 = [
    'k1' => 'val1',
    'k2' => 'val2',
    'k3' => 'val3'
];

$arr3 = [
    1 => 'val1',
    2 => 'val2',
    3 => 'val3'
];

$arr2[50] = "val4";
$arr2[] = "val5";


var_dump($arr1);
var_dump($arr2);
var_dump($arr3[0]);

$var = 5;
$result1 = isset($var) ? $var: 'empty';
$result2 = $var ?? 'empty';

echo $result1 . PHP_EOL;
echo $result2 . PHP_EOL;
