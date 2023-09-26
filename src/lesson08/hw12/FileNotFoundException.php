<?php
declare(strict_types=1);

class FileNotFoundException extends Exception
{
    public function __construct(string $fileName, int $code = 404, ?Throwable $previous = null)
    {
        $message = "Storage file \"$fileName\" not found. Code: $code" . PHP_EOL;
        parent::__construct($message, $code, $previous);
    }
}
