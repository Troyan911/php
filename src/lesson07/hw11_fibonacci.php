<?php
declare(strict_types=1);

$fibonacci = function (int $max): Generator {
    $curr = 0;
    while ($curr < $max) {
        yield $curr;
        [$prev, $curr] = [$curr, $prev != null ? $curr + $prev : 1];
    }
};

function print_generator(Generator $gen_values): void
{
    foreach ($gen_values as $value) {
        echo $value . PHP_EOL;
    }
}

print_generator($fibonacci(1000));