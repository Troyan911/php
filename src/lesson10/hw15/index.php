<?php

require_once "Circle.php";
require_once "Rectangle.php";

printInfo(createCircle(10));
printInfo(createRectangle(10, 5));
printInfo(createCircle(-10));
printInfo(createRectangle(0, -5));

/**
 * @param float $radius
 * @return Figure|null
 */
function createCircle(float $radius): ?Figure
{
    $circle = null;
    try {
        $circle = new Circle($radius);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $circle;
}

/**
 * @param float $width
 * @param float $height
 * @return Figure|null
 */
function createRectangle(float $width, float $height): ?Figure
{
    $rect = null;
    try {
        $rect = new Rectangle($width, $height);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $rect;
}

/**
 * @param Figure|null $figure
 * @return void
 */
function printInfo(?Figure $figure)
{
    if ($figure !== null) {
        $figure->printArea();
        $figure->printPerimeter();
        echo PHP_EOL;
    }
}