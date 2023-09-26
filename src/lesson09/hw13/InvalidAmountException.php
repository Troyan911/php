<?php
class InvalidAmountException extends Exception {
    public function __construct(string $message = "Invalid amount exception", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}