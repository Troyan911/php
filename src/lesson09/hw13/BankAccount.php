<?php

declare(strict_types=1);
require_once("OperationType.php");
require_once("InvalidAmountException.php");
require_once("NotEnoughBalanceException.php");

class BankAccount
{
    private string $accountNumber;
    private float $balance = 0;

    /**
     * @param string $accountNumber
     */
    public function __construct(string $accountNumber)
    {
        $this->accountNumber = $accountNumber;
        echo "Balance with number $accountNumber created\n\n";
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $newBalance
     * @return void
     * @throws InvalidAmountException
     */
    public function setBalance(float $newBalance): void
    {
        if ($this->isAmountValid($newBalance, OperationType::setBalance)) {
            $this->balance = $newBalance;
            echo "Balance successfully updated!\n";
        }
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @param float $amount
     * @param OperationType $operationType
     * @return bool
     * @throws InvalidAmountException
     */
    private function isAmountValid(float $amount, OperationType $operationType): bool
    {
        if ($amount >= 0) {
            return true;
        } else {
            throw new InvalidAmountException("Invalid amount value exception: $amount is not valid value. Operation type: $operationType->name");
        }
    }

    /**
     * @return void
     */
    public function printAccInfo(): void
    {
        echo "Account \"{$this->getAccountNumber()}\" has balance {$this->getBalance()}\n\n";
    }

    /**
     * @param float $amount
     * @return void
     * @throws InvalidAmountException
     */
    public function refill(float $amount): void
    {
        if ($this->isAmountValid($amount, OperationType::refill)) {
            $currenctBalance = $this->getBalance();
            $this->setBalance($currenctBalance + $amount);
        }
    }

    /**
     * @param float $amount
     * @return void
     * @throws InvalidAmountException
     * @throws NotEnoughBalanceException
     */
    public function withdraw(float $amount): void
    {
        if ($this->isAmountValid($amount, OperationType::withdraw) && $this->isEnoughBalance($amount)) {
            $currentBalance = $this->getBalance();
            $this->setBalance($currentBalance - $amount);
        }
    }

    /**
     * @param float $amount
     * @return bool
     * @throws NotEnoughBalanceException
     */
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
