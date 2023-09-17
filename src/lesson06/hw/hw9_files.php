<?php

//write file
$fpath = __DIR__."/storage.txt";

echo "Type some text for saving in file: ";
$input = fgets(STDIN); //. PHP_EOL;

$fwrite = fopen($fpath, "a");
fwrite($fwrite, $input);
fclose($fwrite);

//read file
$fread = fopen($fpath, "r");


//get last line - variant 1
while(($line = fgets($fread)) !== false) {
    $farr[] = $line;
}
echo $farr[count($farr)-1];
fclose($fread);

//get last line - variant2
$data = file($fpath);
echo $data[count($data)-1];

