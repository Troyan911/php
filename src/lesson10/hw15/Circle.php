<?php
declare(strict_types=1);

require_once "Figure.php";

class Circle extends Figure
{

    private float $radius;

    /**
     * @param float $radius
     * @throws Exception
     */
    public function __construct(float $radius)
    {
        $this->setRadius($radius);
    }

    /**
     * @param float $radius
     * @return void
     * @throws Exception
     */
    private function setRadius(float $radius): void
    {
        if ($this->isValueCorrect($radius, "radius")) {
            $this->radius = $radius;
        }
    }

    /**
     * @return float
     */
    public function calcArea(): float
    {
        $this->area = pi() * pow($this->radius, 2);
        return $this->area;
    }

    /**
     * @return float
     */
    public function calcPerimeter(): float
    {
        $this->perimeter = 2 * pi() * $this->radius;
        return $this->perimeter;
    }
}