<?php
require_once "LogLevel.php";

interface LoggerInterface
{
    public const LOG_DATE_FORMAT = "Y-m-d H:i:s";

    /**
     * @param string $message
     * @param LogLevel $level
     * @return void
     */
    public function log(string $message, LogLevel $level): void;

}