<?php
declare(strict_types=1);

function multiply(int $arg1, int $arg2, ? closure $print_result = null): int
{
    $result = $arg1 * $arg2;
    if ($print_result) {
        $print_result($result);
    }
    return $result;
}

$print_result = function (int $result): void {
    echo "Result of multiplying is $result" . PHP_EOL;
};

echo multiply(10, 20) . PHP_EOL;
echo multiply(10, 20, null) . PHP_EOL;
echo multiply(10, 20, $print_result) . PHP_EOL;