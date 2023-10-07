<?php
declare(strict_types=1);
require_once "Validator.php";
require_once "PrintInfo.php";

class Item
{
    use Validator, PrintInfo;

    private string $name;
    private float $price;
    private Currency $currency;

    /**
     * @param string $name
     * @param float $price
     * @param Currency $currency
     */
    public function __construct(string $name, float $price, Currency $currency)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setCurrency($currency);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->isValidName($name);
        $this->name = $name;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->isValidPrice($price);
        $this->price = $price;
    }

    /**
     * @param Currency $currency
     */
    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Item name: $this->name; Price: $this->price; Currency: {$this->currency->name}.";
    }
}