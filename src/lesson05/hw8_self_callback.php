<?php
declare(strict_types=1);

/**
 * @param int $arg1
 * @param int $arg2
 * @param closure|null $print_result
 * @return int
 */
function multiply(int $arg1, int $arg2, ? closure $print_num = null): int
{
    $result = $arg1 * $arg2;
    if ($print_num) {
        $print_num($result);
    }
    return $result;
}

/**
 * @param int $result
 * @return void
 */
$print_num = function (int $result): void {
    echo "Result of multiplying is $result" . PHP_EOL;
};

echo multiply(10, 20) . PHP_EOL;
echo multiply(10, 20, null) . PHP_EOL;
echo multiply(10, 20, $print_num) . PHP_EOL;