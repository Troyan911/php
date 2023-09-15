<?php

ob_start();
include('index.html');
$content = ob_get_clean();

$keywords_should_be_bold = ["Bold text", "Another bold text"];
$keywords_should_be_underscored = ["Underscored text", "Another underscored text"];

$keywords_bold = array_map(fn($item) => "<b>$item</b>", $keywords_should_be_bold);
$keywords_underscored = array_map(fn($item) => "<u>$item</u>", $keywords_should_be_underscored);

$content = str_replace($keywords_should_be_bold, $keywords_bold, $content);
$content = str_replace($keywords_should_be_underscored, $keywords_underscored, $content);

echo $content;

$file = fopen(__DIR__."/new_index.html", "w");
fwrite($file, $content);
fclose($file);

