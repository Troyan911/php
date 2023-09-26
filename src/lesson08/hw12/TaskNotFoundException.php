<?php
declare(strict_types=1);

class TaskNotFoundException extends Exception
{
    public function __construct(int $id, int $code = 404, ?Throwable $previous = null)
    {
        $message = "Task with id $id not found. Code: $code" . PHP_EOL;
        parent::__construct($message, $code, $previous);
    }
}
