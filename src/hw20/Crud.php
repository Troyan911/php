<?php

require_once "Db.php";

class Crud
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Db::getInstance();
    }

    /**
     * @param $sql
     * @return void
     */
    public function createTable($sql): void
    {
        $this->executeQuery($sql);
    }

    /**
     * @param string $className
     * @return void
     */
    public function dropTable(string $className): void
    {
        $sql = "DROP TABLE `$className`";
        $this->executeQuery($sql);
    }

    /**
     * @param string $className
     * @return void
     */
    public function clearTable(string $className): void
    {
        $sql = "DELETE FROM `$className`";
        $this->executeQuery($sql);
    }

    /**
     * @param object $object
     * @return array|null
     */
    function insertRow(object $object): ?array
    {
        $table = strtolower(get_class($object));
        $fields = "`" . implode("`,`", array_keys($object->getFields())) . "`";
        $values = "\"" . implode("\",\"", array_values($object->getFields())) . "\"";
        $sql = "INSERT INTO `$table` ($fields) VALUES ($values);";
        $row = $this->executeQuery($sql);
        $object->setId($this->connection->lastInsertId());
        return $row;
    }

    /**
     * @param object $object
     * @return array
     */
    private function selectRow(object $object): array
    {
        $table = strtolower(get_class($object));
        $sql = "SELECT * FROM `$table` WHERE `id` = :id";

        return $this->executeQuery($sql, $object, true);
    }

    /**
     * @param object $object
     * @return void
     */
    public function displayRow(object $object): void
    {
        echo "<pre>";
        print_r($this->selectRow($object));
        echo "</pre>";
    }

    /**
     * @param object $object
     * @return void
     */
    public function updateRow(object $object): void
    {
        $table = strtolower(get_class($object));
        $sql = "UPDATE `$table`";
        $sql .= " SET ";

        foreach ($object->getFields() as $key => $value) {
            $sql .= "`$key` = \"$value\", ";
        }
        $sql = substr($sql, 0, strlen($sql) - 2);
        $sql .= " WHERE id = :id";

        $this->executeQuery($sql, $object);
    }

    /**
     * @param object $object
     * @param bool $deleteAll
     * @return void
     */
    public function deleteRow(object $object, bool $deleteAll = false): void
    {
        $table = strtolower(get_class($object));
        $sql = "DELETE FROM $table";
        $sql .= $deleteAll ? "" : " WHERE `id` = :id";
        $this->executeQuery($sql, $object, false);
    }

    /**
     * @param string $sql
     * @param object|null $object
     * @param bool $fetchData
     * @return array|null
     */
    private function executeQuery(string $sql, object $object = null, bool $fetchData = false): ?array
    {
        $stmt = $this->connection->prepare($sql);

        if (isset($object) && $object->hasId()) {
            $stmt->bindValue("id", $object->getId());
            echo $stmt->queryString . ", " . $object->getId() . "<br>";
        } else {
            echo $stmt->queryString . "<br>";
        }

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $fetchData ? $stmt->fetchAll() : null;
    }

}
