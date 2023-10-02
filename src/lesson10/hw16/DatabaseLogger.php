<?php
declare(strict_types=1);

require_once "LoggerInterface.php";

//todo can include mistakes. will be updated later
class DatabaseLogger implements LoggerInterface
{
    private PDO $connection;

    /**
     * @param string $host
     * @param string $user
     * @param string $pswd
     */
    public function __construct(string $host, string $user, string $pswd)
    {
        $this->setConnection($host, $user, $pswd);
    }

    /**
     * @param string $host
     * @param string $user
     * @param string $pswd
     * @return void
     */
    private function setConnection(string $host, string $user, string $pswd): void
    {
        try {
            $this->connection = new PDO("mysql:host=$host;dbname=myDB", $user, $pswd);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param LogLevel $level
     * @param string $message
     * @return void
     */
    public function log(LogLevel $level, string $message): void
    {
        $date = date(self::LOG_DATE_FORMAT);
        $query = "INSERT INTO Logs (datetime, level, message) VALUES ($date, $level->value, $message)";

        try {
            $this->connection->exec($query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}