<?php

require_once("BankAccount.php");
require_once("InvalidAmountException.php");
require_once("NotEnoughBalanceException.php");


$acc1 = new BankAccount("Acc01");
tryChangeBalance($acc1, OperationType::setBalance, 100500.99);
tryChangeBalance($acc1, OperationType::setBalance, -100500.99);
tryChangeBalance($acc1, OperationType::setBalance, 10500.99);

tryChangeBalance($acc1, OperationType::refill, -20.02);
tryChangeBalance($acc1, OperationType::refill, 20.02);

tryChangeBalance($acc1, OperationType::withdraw, 20.02);
tryChangeBalance($acc1, OperationType::withdraw, 20500.02);

/**
 * @param BankAccount $account
 * @param OperationType $operationType
 * @param float $amount
 * @return void
 */
function tryChangeBalance(BankAccount $account, OperationType $operationType, float $amount): void
{
    try {
        $fn = $operationType->name;
        $account->$fn($amount);
    } catch (Exception $e) {
        echo "{$e->getMessage()}\n";
    }
    $account->printAccInfo();
}




