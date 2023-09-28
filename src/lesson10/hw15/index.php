<?php

require_once "Circle.php";
require_once "Rectangle.php";


printInfo(new Circle(10));
printInfo(new Rectangle(10, 5));
//createFigureAndPrintInfo(Circle::class, 10);


function printInfo(Figure $figure)
{
    try {
//        $obj = new $figure(extract($props));

        echo $figure::class . PHP_EOL;
        $figure->printArea() . PHP_EOL;
        $figure->printPerimeter() . PHP_EOL . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}