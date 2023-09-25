<?php

require_once 'logger.php';
require_once 'logger.php';

echo __DIR__ . PHP_EOL;

$filepath = __DIR__ . "/test.txt";

$stream = fopen($filepath, 'r+');
$filesize = filesize($filepath);

echo fread($stream, $filesize) .PHP_EOL;

$message = "shut up and support army\n";

fwrite($stream, $message);
echo fread($stream, $filesize) .PHP_EOL;

fclose($stream);

echo "File: " . file_get_contents($filepath);
file_put_contents($filepath, "another row\n", FILE_APPEND);

//rename($filepath, __DIR__ . "/test/test.txt");

include_once "logger.php";

logger("Test log");