<?php

function read_file(string $filename) {

    if(!file_exists($filename)){
        return;
    }

    $file = fopen($filename, 'r');

    while (($line = fgets($file)) !== false) {
        yield $line;
    }

    fclose($file);
}

