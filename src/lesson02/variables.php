<?php

function qwe() {
    echo "qwe" . PHP_EOL;
}

$str = "hello";

$str[1] = "i";

echo $str;

function QWE1($a) {
    echo "QWE" . PHP_EOL;
}

qwe();
QWE();

$test = boolval("-0");

//FALSE, 0, -0, 0.0, -0.0, '', '0', null

var_dump($test);

echo "What's your name?" . PHP_EOL;
$name = fgets(STDIN);

$name = trim($name);

var_dump($name);

echo "Thanks $name. Care yourself";