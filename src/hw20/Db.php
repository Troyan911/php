<?php

class Db
{
    private static PDO $instance;

    private function __construct()
    {
        try {
            self::$instance = new PDO("mysql:host=mysql;port=3306;dbname=testdb", "root", "123",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);

        } catch (PDOException $exception) {
            echo $exception->getMessage();
            exit;
        }
    }

    /**
     * @return void
     */
    private function __clone()
    {

    }

    /**
     * @return void
     */
    public function __wakeup(): void
    {
        throw new PDOException("Can't unserialize singleton");
    }

    /**
     * @return PDO
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            new Db;
        }
        return self::$instance;
    }
}