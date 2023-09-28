<?php
declare(strict_types=1);

require_once "Figure.php";

class Circle extends Figure
{

    private float $radius;

    public function __construct(float $radius)
    {
        $this->setRadius($radius);
    }

    /**
     * @param float $radius
     */
    private function setRadius(float $radius): void
    {
        $this->isValueCorrect($radius);
        $this->radius = $radius;
    }

    public function calcArea(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function calcPerimeter(): float
    {
        return 2 * pi() * $this->radius;
    }
}