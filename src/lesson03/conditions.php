<?php

$lang = "en";
$name = "John";
$message = null;


if ($lang === "ua") {
    $message = "Pruvit";
} else if ($lang === "de") {
    $message = "Hi";
}
$result = $message . " " . $name . PHP_EOL;
echo $result . PHP_EOL;


$message = match ($lang) {
    "ua" => "Pruvit",
    "en" => "Hello",
    default => "Hi"
};

echo $message;

switch ($lang) {
    case "ua":
        $message = "Pruvit";
        break;
}

$var = 1;
$arr = [1 => "a", 2 => "b", 3 => "c", 4 => "d"];

//$res = match($var) { array_values($arr), default => "qwe"};