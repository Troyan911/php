<?php
declare(strict_types=1);

require_once "FileLogger.php";

$logPath = __DIR__ . "/logs.txt";
$fileLogger = new FileLogger($logPath);

writeLog($fileLogger, LogLevel::DEBUG, "UserId=asd123");
writeLog($fileLogger, LogLevel::INFO, "User created");
writeLog($fileLogger, LogLevel::WARNING, "Incorrect password");
writeLog($fileLogger, LogLevel::ERROR, "User not found");

/**
 * @param LoggerInterface $logger
 * @param LogLevel $logLevel
 * @param string $message
 * @return void
 */
function writeLog(LoggerInterface $logger, LogLevel $logLevel, string $message)
{
    $logger->log($logLevel, $message);
}