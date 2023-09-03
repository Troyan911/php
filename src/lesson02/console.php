<?php

echo "Please enter your name: ";
$name = trim(fgets(STDIN)); // trim для видалення переносу строки, який береться при читанні з консолі

echo "Hello there $name! Here is simple console program on php!" . PHP_EOL;
echo "Hello there " . $name . "! Here is simple console program on php!" . PHP_EOL;

echo "Please type few integer numbers separated by space: ";

$input = fgets(STDIN);
$arr = explode(" ", $input);
//повертається масив строк але тут працює автоконвертація типів. при реалізації чз фор можна перевіряти на is_numeric і приводити тип явно
//var_dump($arr);

$sum = array_sum($arr);
$avg = $sum / sizeof($arr);

echo "Sum of array's elements is $sum and average value of elements is $avg". PHP_EOL;