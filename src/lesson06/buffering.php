<?php

echo 'start' . PHP_EOL;

for ($i = 0; $i < 10; $i++) {
    echo "step $i" . PHP_EOL;
    flush();
//    sleep(1);
}

ob_start();
echo "Hi! ";
$content = ob_get_clean();

echo str_replace("Hi", "Hello", $content);

ob_end_clean();
ob_get_contents();
ob_flush();