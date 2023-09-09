<?php

//fill variant 1
//$arr = [];
//for ($i = 0; $i < 10; $i++) {
//    $arr[$i] = rand(-100, 100);
//    // була ідея заповнити без циклу чз array_fill, але якщо передати в нього rand() то фія викликається один раз і всі елементи однакові
//}

//fill variant 2
$rand_arr = range(-100, 100);
shuffle($rand_arr);
$rand_arr = array_slice($rand_arr, 0, 10);

//search min max
//loop
$min_value = $rand_arr[0];
$max_value = $rand_arr[0];
foreach ($rand_arr as $value) {
    $min_value = $value < $min_value ? $value : $min_value;
    $max_value = $value > $max_value ? $value : $max_value;
}

//fn
$min_fn_value = min($rand_arr);
$max_fn_value = max($rand_arr);

var_dump("min value: $min_value");
var_dump("max value: $max_value");
var_dump("min fn value: $min_fn_value");
var_dump("max fn value: $max_fn_value");

//sorting
$rand_arr2 = $rand_arr; //copy to another array for sorting in loop
rsort($rand_arr);

print_r("sorted arr: ");
print_r($rand_arr);

print_r("unsorted arr:");
print_r($rand_arr2);

for ($i = 0; $i < count($rand_arr2); $i++) {
    for ($j = $i + 1; $j < count($rand_arr2); $j++) { // $j = $i + 1 - for avoid comparing element with itself
//        print_r("i: $i j: $j" . PHP_EOL); // look how is sort works
        if ($rand_arr2[$i] < $rand_arr2[$j]) {
            [$rand_arr2[$i], $rand_arr2[$j]] = [$rand_arr2[$j], $rand_arr2[$i]]; //swap vars via [a,b] = [b,a]
        }
    }
}

print_r("sorted arr: ");
print_r($rand_arr2);
