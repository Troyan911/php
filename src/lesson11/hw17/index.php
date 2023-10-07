<?php
declare(strict_types=1);
require_once "User.php";
require_once "Company.php";
require_once "Item.php";
require_once "Currency.php";


$user1 = new User("Petro Bamper", "petrobamper@gmail.com", "+3806720201111");
$user1->print();

$company1 = new Company("Google", "New York");
$company1->print();

$item1 = new Item("Gun", 100, Currency::USD);
$item1->print();