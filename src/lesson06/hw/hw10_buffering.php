<?php

ob_start();
include('index.html');
$content = ob_get_clean();

wrap_keywords($content, ["Bold text", "Another bold text"], "b");
wrap_keywords($content, ["Underscored text", "Another underscored text"], "u");
wrap_keywords($content, ["Italic text"], "i");

echo $content;

$file = fopen(__DIR__."/new_index.html", "w");
fwrite($file, $content);
fclose($file);

function wrap_keywords(string &$content, array $keywords, string $tag) : void {
    $wrapped_keywords = array_map(fn($item) => "<$tag>$item</$tag>", $keywords);
    $content = str_replace($keywords, $wrapped_keywords, $content);
}