<?php
declare(strict_types=1);
require_once "PhoneFormat.php";

trait Validator
{
    /**
     * @param string $name
     * @return void
     * @throws Exception
     */
    public function isValidName(string $name)
    {
        if (strlen($name) < 2) {
            throw new Exception("Name $name is too short\n");
        }
    }

    /**
     * @param string $city
     * @return void
     * @throws Exception
     */
    public function isValidCity(string $city)
    {
        //todo + check is sity in cities list
        if (strlen($city) < 3) {
            throw new Exception("City $city is incorrect\n");
        }
    }

    /**
     * @param float $price
     * @return void
     * @throws Exception
     */
    public function isValidPrice(float $price)
    {
        if ($price <= 0) {
            throw new Exception("Price $price is incorrect\n");
        }
    }

    /**
     * @param string $phone
     * @return void
     * @throws Exception
     */
    public function isValidPhone(string $phone)
    {
        if (!str_starts_with($phone, PhoneFormat::UA->value)) {
            throw new Exception("Phone $phone is incorrect\n");
        }
    }

    /**
     * @param string $email
     * @return void
     * @throws Exception
     */
    public function isValidEmail(string $email)
    {
        if (!(str_contains($email, "@") && strlen($email) > 3)) {
            throw new Exception("Email $email is incorrect\n");
        }
    }

}