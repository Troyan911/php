<?php

function logger(string $message, string $fname = 'logs.txt'): void
{
    $date = date('d-m-Y H:i:s');
    $template = "[$date][$message]" . PHP_EOL;

    $file = fopen(__DIR__ . "/storage/$fname", 'a');
    fwrite($file, $template);
    fclose($file);

//    file_put_contents($fname, $template, FILE_APPEND);
}