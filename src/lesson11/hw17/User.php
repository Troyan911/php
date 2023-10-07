<?php
declare(strict_types=1);
require_once "Validator.php";
require_once "PrintInfo.php";

class User
{
    use Validator, PrintInfo;

    private string $name;
    private string $email;
    private string $phone;

    public function __construct(string $name, string $email, string $phone)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPhone($phone);
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
     * @param string $city
     */
    public function setEmail(string $email): void
    {
        $this->isValidEmail($email);
        $this->email = $email;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->isValidPhone($phone);
        $this->phone = $phone;
    }

    public function __toString(): string
    {
        return "User name: $this->name; Email: $this->email; Phone: $this->phone.";
    }
}
