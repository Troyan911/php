<?php
declare(strict_types=1);
require_once "Validator.php";
require_once "PrintInfo.php";

class Company
{
    use Validator, PrintInfo;

    private string $companyName;
    private string $city;

    /**
     * @param string $companyName
     * @param string $city
     */
    public function __construct(string $companyName, string $city)
    {
        $this->setCompanyName($companyName);
        $this->setCity($city);
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName(string $companyName): void
    {
        $this->isValidName($companyName);
        $this->companyName = $companyName;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->isValidCity($city);
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Company name: $this->companyName; City: $this->city.";
    }
}