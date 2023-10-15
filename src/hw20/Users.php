<?php

require_once "CrudFieldsTrait.php";
require_once "CrudInterface.php";
require_once "Sex.php";
require_once "../hw17/ValidatorTrait.php";

class Users implements CrudInterface
{
    use CrudFieldsTrait;
    use ValidatorTrait;

    private string $name;
    private string $email;
    private int $age;
    private string $sex;
    private static string $createTableQuery =
        "create table `users`
        (
            `id`    int unsigned auto_increment
                primary key,
            `name`  char(50)                                                       not null,
            `email` char(100) UNIQUE                                               not null,
            `age`   smallint unsigned                                              null,
            `sex`   enum ('male', 'female', 'not selected') default 'not selected' null
        );";

    public function __construct(string $name, string $email, int $age, Sex $sex)
    {
        try {
            $this->setName($name);
            $this->setEmail($email);
            $this->setAge($age);
            $this->setSex($sex);

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
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
     * @param int $age
     * @return void
     * @throws Exception
     */
    public function setAge(int $age): void
    {
        $this->isValidAge($age);
        $this->age = $age;
    }

    /**
     * @param Sex $sex
     * @return void
     */
    public function setSex(Sex $sex): void
    {
        //todo        $this->isValidEnum(enum: Sex, $sex);
        $this->sex = $sex->value;
    }
}


