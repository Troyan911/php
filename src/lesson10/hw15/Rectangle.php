<?php
declare(strict_types=1);

require_once "Figure.php";

class Rectangle extends Figure
{
    private float $width;
    private float $height;

    /**
     * @param float $width
     * @param float $height
     * @throws Exception
     */
    public function __construct(float $width, float $height)
    {
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @param float $width
     * @return void
     * @throws Exception
     */
    public function setWidth(float $width): void
    {
        if ($this->isValueCorrect($width, "width")) {
            $this->width = $width;
        }
    }

    /**
     * @param float $height
     * @return void
     * @throws Exception
     */
    public function setHeight(float $height): void
    {
        if ($this->isValueCorrect($height, "height")) {
            $this->height = $height;
        }
    }

    /**
     * @return float
     */
    public function calcArea(): float
    {
        $this->area = $this->width * $this->height;
        return $this->area;
    }

    /**
     * @return float
     */
    public function calcPerimeter(): float
    {
        $this->perimeter = ($this->width + $this->height) * 2;
        return $this->perimeter;
    }
}