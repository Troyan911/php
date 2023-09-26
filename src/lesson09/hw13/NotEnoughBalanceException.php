<?php
class NotEnoughBalanceException extends Exception {
    public function __construct(string $message = "Not enough balance exception", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}