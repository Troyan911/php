<?php
declare(strict_types=1);

echo "Circle square" . PHP_EOL;
function circle_square(int|float $radius): float
{
    return M_PI * ($radius ** 2); // степінь більш пріоритетний але для наглядності додав дужки, вони не впливають на навантаження скрипту
}

function print_squares(array $radiuses): void
{
    $squares = array_map('circle_square', $radiuses);
    for ($i = 0; $i < count($radiuses); $i++) {
        echo "Square for circle with radius $radiuses[$i] is $squares[$i]" . PHP_EOL;
    }
}

print_squares([1, 2, 3]);
print_squares([5, 10]);

//2. Написати програму на PHP, яка приймає число і підносить його до ступеню
echo PHP_EOL . "Power variable on value" . PHP_EOL;

function power(int|float $i, int $exponent): string
{
    return "The power of number $i with exponent $exponent is " . $i ** $exponent . PHP_EOL;
}

echo power(2, 10);
echo power(8, 8);

//3. Використайте функцію в двох варіантах: коли вона повертає нове число і змінює передане.
echo PHP_EOL . "Power variable on link" . PHP_EOL;

function power_value(int|float &$i, int $exponent): void
{
    $i **= $exponent;
}

$var1 = 2;
$var2 = 8;

power_value($var1, 10);
power_value($var2, 8);

echo $var1 . PHP_EOL;
echo $var2 . PHP_EOL;
