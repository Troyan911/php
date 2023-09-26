<?php

declare(strict_types=1);
require_once("OperationType.php");
require_once("InvalidAmountException.php");
require_once("NotEnoughBalanceException.php");


class BankAccount
{
    private string $accountNumber;
    private float $balance = 0;

    public function __construct(string $accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setBalance(float $newBalance): void
    {
        if ($this->isAmountValid($newBalance, OperationType::setBalance)) {
            $this->balance = $newBalance;
            echo "Balance successfully updated!\n";
        }
    }

    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    private function isAmountValid(float $amount, OperationType $operationType): bool
    {
        if ($amount >= 0) {
            return true;
        } else {
            throw new InvalidAmountException("Invalid amount value exception: $amount is not valid value. Operation type: $operationType->name");
        }
    }

    public function printAccInfo(): void
    {
        echo "Account number \"{$this->getAccountNumber()}\" with balance {$this->getBalance()}\n\n";
    }

    public function refill(float $amount)
    {
        if ($this->isAmountValid($amount, OperationType::refill)) {
            $currenctBalance = $this->getBalance();
            $this->setBalance($currenctBalance + $amount);
        }
    }

    public function withdraw(float $amount)
    {
        if ($this->isAmountValid($amount, OperationType::withdraw) && $this->isEnoughBalance($amount)) {
            $currentBalance = $this->getBalance();
            $this->setBalance($currentBalance - $amount);
        }
    }

    private function isEnoughBalance(float $amount): bool
    {
        $currentBalance = $this->getBalance();
        if ($currentBalance >= $amount) {
            return true;
        } else {
            throw new NotEnoughBalanceException("Not enough balance $currentBalance for withdraw $amount exception");
        }
    }
}
