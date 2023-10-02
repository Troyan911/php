<?php
declare(strict_types=1);

require_once "FileLogger.php";
require_once "DatabaseLogger.php";


$logPath = __DIR__ . "/logs.txt";

$fileLogger = new FileLogger($logPath);


$fileLogger->log("UserId=asd123", LogLevel::DEBUG);
$fileLogger->log("User created", LogLevel::INFO);
$fileLogger->log("Incorrect password", LogLevel::WARNING);
$fileLogger->log("User not found", LogLevel::ERROR);
