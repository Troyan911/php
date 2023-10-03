<?php
declare(strict_types=1);

abstract class Figure
{
    protected float $area;
    protected float $perimeter;

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
        echo "Square of " . static:: class . " is $this->area\n";
    }

    /**
     * @return void
     */
    public function printPerimeter(): void
    {
        $this->calcPerimeter();
        echo "Perimeter of " . static:: class . " is $this->perimeter\n";
    }

    /**
     * @param float $propValue
     * @param string $propName
     * @return bool
     * @throws Exception
     */
    protected function isValueCorrect(float $propValue, string $propName): bool
    {
        if ($propValue <= 0) {
            throw new Exception("Cant't create " . static::class . ". Param $propName with value $propValue is incorrect\n");
        }
        return true;
    }
}