<?php
declare(strict_types=1);

require_once "LoggerInterface.php";

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
    private function setConnection(string $host, string $user, string $pswd)
    {
        try {
            $this->connection = new PDO("mysql:host=$host;dbname=myDB", $user, $pswd);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param string $message
     * @param LogLevel $level
     * @return void
     */
    public function log(string $message, LogLevel $level): void
    {
        // TODO: Implement log() method
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO Logs (datetime, level, message) VALUES ($date, $level->value, $message)";

        try {
            $this->connection->exec($query);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}