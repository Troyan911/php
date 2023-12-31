<?php
declare(strict_types=1);

require_once "LoggerInterface.php";

class FileLogger implements LoggerInterface
{
    private string $filePath;

    /**
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->setFilePath($filePath);
    }

    /**
     * @param string $filePath
     * @return void
     */
    private function setFilePath(string $filePath): void
    {
        //create file if not exists
        if (!file_exists($filePath)) {
            file_put_contents($filePath, "");
        }
        $this->filePath = $filePath;
    }

    /**
     * @param LogLevel $level
     * @param string $message
     * @return void
     */
    public function log(LogLevel $level, string $message): void
    {
        $date = date(self::LOG_DATE_FORMAT);
        $row = sprintf("[%s][%s][%s]\n", $date, $level->value, $message);
        file_put_contents($this->filePath, $row, FILE_APPEND);
    }
}