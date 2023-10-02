<?php
require_once "LogLevel.php";

interface LoggerInterface
{
    public const LOG_DATE_FORMAT = "Y-m-d H:i:s";

    /**
     * @param LogLevel $level
     * @param string $message
     * @return void
     */
    public function log(LogLevel $level, string $message): void;

}