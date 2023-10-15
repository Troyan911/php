<?php
declare(strict_types=1);

namespace hw17;

require_once "ValidatorTrait.php";
require_once "PrintInfo.php";

class Item
{
    use \ValidatorTrait, PrintInfo;

    private string $name;
    private float $price;
    private Currency $currency;

    /**
     * @param string $name
     * @param float $price
     * @param Currency $currency
     * @throws Exception
     */
    public function __construct(string $name, float $price, Currency $currency)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setCurrency($currency);
    }

    /**
     * @param string $name
     * @return void
     * @throws Exception
     */
    public function setName(string $name): void
    {
        $this->isValidName($name);
        $this->name = $name;
    }

    /**
     * @param float $price
     * @return void
     * @throws Exception
     */
    public function setPrice(float $price): void
    {
        $this->isValidPrice($price);
        $this->price = $price;
    }

    /**
     * @param Currency $currency
     * @return void
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