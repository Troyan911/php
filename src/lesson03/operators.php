<?php
$a = 5;
$b = 2;

echo $a + $b . PHP_EOL;
echo $a - $b . PHP_EOL;
echo $a * $b . PHP_EOL;
echo $a / $b . PHP_EOL;
echo $a % $b . PHP_EOL;
echo $a ** $b . PHP_EOL;

$x = false;
$y = '0';

var_dump($x === (boolean)$y);

echo (1 <=> 1) . PHP_EOL;
echo (0 <=> 1) . PHP_EOL;
echo (1 <=> 0) . PHP_EOL;

echo (true xor true) . PHP_EOL;
echo (true xor false) . PHP_EOL;
echo (false xor true) . PHP_EOL;
echo (false xor false) . PHP_EOL;


echo (true && true) . PHP_EOL;
echo (true && false) . PHP_EOL;
echo (false && true) . PHP_EOL;
echo (false && false) . PHP_EOL;


var_dump(true || false && false );


//1 & 0 | 1 & 0




