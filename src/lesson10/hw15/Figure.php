<?php
declare(strict_types=1);

abstract class Figure
{

    private float $area;
    private float $perimeter;

    /**
     * @return float
     */
    public abstract function calcArea(): float;

    /**
     * @return float
     */
    public abstract function calcPerimeter(): float;

    /**
     * @return void
     */
    public function printArea(): void
    {
        $this->calcArea();
        echo $this->area;
    }

    /**
     * @return void
     */
    public function printPerimeter(): void
    {
        $this->calcPerimeter();
        echo $this->perimeter;
    }

    /**
     * @param float $propValue
     * @return void
     * @throws Exception
     */
    protected function isValueCorrect(float $propValue)
    {
        if ($propValue <= 0) {
            throw new Exception("$$propValue with $propValue is incorrect");
        }
    }
}