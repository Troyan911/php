<?php

require_once "Router.php";

$router = new Router();

$router->addRoute("index", [
    "GET" => "IndexController@greeting",
    "POST" => "IndexController@calculate",
    "PUT" => "IndexController@update",
    "DELETE" => "IndexController@delete",
]);

try {
    $router->processRoute();
} catch (Exception $e) {
    echo $e->getMessage();
}

