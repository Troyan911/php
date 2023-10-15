<?php
declare(strict_types=1);

namespace hw17;

require_once "ValidatorTrait.php";
require_once "PrintInfo.php";

class Company
{
    use \ValidatorTrait, PrintInfo;

    private string $companyName;
    private string $city;

    /**
     * @param string $companyName
     * @param string $city
     * @throws Exception
     */
    public function __construct(string $companyName, string $city)
    {
        $this->setCompanyName($companyName);
        $this->setCity($city);
    }

    /**
     * @param string $companyName
     * @return void
     * @throws Exception
     */
    public function setCompanyName(string $companyName): void
    {
        $this->isValidName($companyName);
        $this->companyName = $companyName;
    }

    /**
     * @param string $city
     * @return void
     * @throws Exception
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