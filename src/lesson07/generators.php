<?php

function generator(array $values = []) : Generator {
    for ($i = 0; $i < 10; $i++) {
        yield 0;
        if(!in_array($i, $values)) {
            yield $i;
        }
    }
}

$gene = generator([5,7]);
foreach ($gene as $value) {
    echo $value . PHP_EOL;
}

function generator2($array) : Generator
{
    yield 2;
    yield from $array;
}

$arr = [1,3,5,7];

$gene = generator2($arr);
foreach ($gene as $value) {
    echo $value . PHP_EOL;
}


function range_gene (int $start, int $end) : Generator {
    for ($i = $start; $i < $end; $i++) {
        yield $i;
    }
}


function escaped_gene() {
    for ($i = 0; $i < 10; $i++) {
        $cmd = (yield $i);

        if($cmd == "stop") {
            return;
        }
        else if($cmd == "continue") {
            continue;
        }

    }
}

function print_gene(Generator $gen_values): void
{
    foreach ($gen_values as $value) {
        if($value == 4) {
            $gen_values->send("continue");
        }
        echo $value . PHP_EOL;
    }
}

print_gene(escaped_gene());


$start = memory_get_usage();
//$range = range_gene(1, 1000);
//$arr = range(1, 1000);
$end = memory_get_usage();
echo $end-$start;

echo "__";
echo $var = 2+3;