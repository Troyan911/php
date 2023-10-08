<?php
declare(strict_types=1);
require_once "User.php";
require_once "Company.php";
require_once "Item.php";
require_once "Currency.php";


$user1 = tryCreateUser("Petro bamper", "petrobamper@gmail.com", "+3806720201111");
$user1->print();

$company1 = tryCreateCompany("Google", "New York");
$company1->print();

$item1 = tryCreateItem("Gun", 100, Currency::USD);
$item1->print();

/**
 * @param string $name
 * @param string $email
 * @param string $phone
 * @return User
 */
function tryCreateUser(string $name, string $email, string $phone): User
{
    try {
        return new User($name, $email, $phone);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

/**
 * @param string $name
 * @param string $city
 * @return Company
 */
function tryCreateCompany(string $name, string $city): Company
{
    try {
        return new Company($name, $city);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

/**
 * @param string $name
 * @param float $price
 * @param Currency $currency
 * @return Item
 */
function tryCreateItem(string $name, float $price, Currency $currency): Item
{
    try {
        return new Item($name, $price, $currency);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

