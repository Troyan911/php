<?php
declare(strict_types=1);

namespace hw17;

require_once "ValidatorTrait.php";
require_once "PrintInfo.php";

class User
{
    use \ValidatorTrait, PrintInfo;

    private string $name;
    private string $email;
    private string $phone;

    /**
     * @param string $name
     * @param string $email
     * @param string $phone
     * @throws Exception
     */
    public function __construct(string $name, string $email, string $phone)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPhone($phone);
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
     * @param string $email
     * @return void
     * @throws Exception
     */
    public function setEmail(string $email): void
    {
        $this->isValidEmail($email);
        $this->email = $email;
    }

    /**
     * @param string $phone
     * @return void
     * @throws Exception
     */
    public function setPhone(string $phone): void
    {
        $this->isValidPhone($phone);
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "User name: $this->name; Email: $this->email; Phone: $this->phone.";
    }
}
