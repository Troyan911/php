<?php
declare(strict_types=1);

class TaskNotFoundException extends Exception
{
    /**
     * @param int $id
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(int $id, int $code = 404, ?Throwable $previous = null)
    {
        $message = "Task with id $id not found. Code: $code" . PHP_EOL;
        parent::__construct($message, $code, $previous);
    }
}
