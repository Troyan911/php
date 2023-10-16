<?php

trait TableFieldsTrait
{
    private int $id;

    /**
     * @return array
     */
    public function getFields(): array
    {
        $vars = get_object_vars($this);
        unset($vars["id"]);
        unset($vars["createQuery"]);
        extract($vars);
        return compact(array_keys($vars));
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function hasId(): bool
    {
        return isset($this->id);
    }

    /**
     * @return string
     */
    public static function getCreateTableQuery(): string
    {
        return self::$createTableQuery;
    }
}