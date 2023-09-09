<?php


$arr = ['el1', 'el2', 'el3', 'el4', 'el5'];

//sizeof()

$i = 0;
$length = count($arr);

while ($i < $length) {
    echo $arr[$i] . PHP_EOL;
    $i++;
}

for ($i = 0; $i < $length; $i++) {
    echo $arr[$i] . PHP_EOL;
}

foreach ($arr as $key => $value) {
    echo "$key => $value" . PHP_EOL;
}

$vacancies = [
    ['title' => 'dev', 'salary' => 4000, 'location_id' => 1],
    ['title' => 'qa', 'salary' => 3000, 'location_id' => 2],
    ['title' => 'pm', 'salary' => 2000, 'location_id' => 3],
];

$locations = [
    ['id' => 1, 'name' => 'Kyiv'],
    ['id' => 2, 'name' => 'Lutsk'],
    ['id' => 3, 'name' => 'Odessa']
];


foreach ($vacancies as $key => $vacancy) {
    foreach ($locations as $k => $location) {
        if ($vacancy['location_id'] === $location['id']) {
            $vacancies[$key]['location'] = $location['name'];
            unset($vacancies[$key]['location_id']);
            break;
        }
    }
}

var_dump($vacancies);


$arr1 = [1, 2, 3, 4, 5];
$arr2 = [10, 12, 13, 14, 15];

foreach ($arr1 as $val1) {
    foreach ($arr2 as $val2) {
    }
}

list($a, $b, $c) = $arr1;
[$a, $b, $c] = $arr1;


extract($arr1);
$arr = compact('var1', 'var2', 'var3');


$new_arr = array_map(function ($elem) {
    return $elem ** 2;
}, $arr1);

var_dump($new_arr);

//array_reduce()
//array_filter()
//own array map