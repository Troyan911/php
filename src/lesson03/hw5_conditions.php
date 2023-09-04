<?php

echo "Type number from 1 to 6 for different colors, other for white: " . PHP_EOL;
$value = (int)trim(fgets(STDIN));

$result = match ($value) {
    1 => "green",
    2 => "red",
    3 => "blue",
    4 => "brown",
    5 => "violet",
    6 => "black",
    default => "white"
};

echo $result . PHP_EOL;
$result = null;

switch ($value) {
    case 1:
        $result = "green";
        break;
    case 2:
        $result = "red";
        break;
    case 3:
        $result = "blue";
        break;
    case 4:
        $result = "brown";
        break;
    case 5:
        $result = "violet";
        break;
    case 6:
        $result = "black";
        break;
    default:
        $result = "white";
};
echo $result . PHP_EOL;
$result = null;


if ($value == 1) {
    $result = "green";
} elseif ($value == 2) {
    $result = "red";
} elseif ($value == 3) {
    $result = "blue";
} elseif ($value == 4) {
    $result = "brown";
} elseif ($value == 5) {
    $result = "violet";
} elseif ($value == 6) {
    $result = "black";
} else {
    $result = "white";
}
echo $result . PHP_EOL;
