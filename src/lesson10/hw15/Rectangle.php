<?php
declare(strict_types=1);

require_once "Figure.php";

class Rectangle extends Figure
{
    private float $width;
    private float $height;

    public function __construct(float $width, float $height)
    {
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @param float $width
     */
    public function setWidth(float $width): void
    {
        $this->isValueCorrect($width);
        $this->width = $width;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height): void
    {
        $this->isValueCorrect($height);
        $this->height = $height;
    }

    public function calcArea(): float
    {
        return $this->width * $this->height;
    }

    public function calcPerimeter(): float
    {
        return ($this->width + $this->height) * 2;
    }
}