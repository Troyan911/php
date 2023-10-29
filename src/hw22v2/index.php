<?php
require_once "Response.php";
require_once "Router.php";

$router = new Router();

$router->addRoute("json", [
    "GET" => "JsonController@index",
]);

$router->addRoute("html", [
    "GET" => "HtmlController@index",
]);

$router->addRoute("xml", [
    "GET" => "XmlController@index",
]);

$router->addRoute("serverError", [
    "GET" => "ServerErrorController@index",
]);

$router->addRoute("clientError", [
    "GET" => "ClientErrorController@index",
]);

try {
    $router->processRoute();
} catch (Exception $e) {
    echo $e->getMessage();
}