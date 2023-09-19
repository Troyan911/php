<?php
declare(strict_types=1);

//v1
$fibonacci1 = function (int $max): Generator {
    $curr = 0;
    while ($curr < $max) {
        yield $curr;
        [$prev, $curr] = [$curr, $prev != null ? $curr + $prev : 1];
    }
};

//v2
$fibonacci2 = function (int $max): Generator {
    $arr = [0, 1];
    $i = 0;
    while ($arr[$i] + $arr[$i + 1] < $max) {
        $arr[] = $arr[$i] + $arr[$i + 1];
        $i++;
    }
    yield from $arr;
};

function print_generator(Generator $generator): void
{
    foreach ($generator as $value) {
        echo $value . PHP_EOL;
    }
}

print_generator($fibonacci1(1000));