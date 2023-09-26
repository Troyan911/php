<?php

class Employee
{
    private string $name;

    public function getInfo()
    {
        echo "\nName is: $this->name\n";
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class Manager extends Employee
{
    protected string $role = 'manager';

    public function getInfo()
    {
        parent::getInfo();
        echo "Role: $this->role\n";
    }
}

class Developer extends Manager {
    protected string $role = "dev";
}

$emp1 = new Employee("John");
$emp1->getInfo();

$mng1 = new Manager("Mike");
$mng1->getInfo();

$dev = new Developer("Joe");
$dev->getInfo();

echo $emp1 instanceof Employee;
echo $dev instanceof Employee;
echo $emp1 instanceof Developer;
