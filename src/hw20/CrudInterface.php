<?php

interface CrudInterface
{
    /**
     * @return array
     */
    public function getFields(): array;

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void;

    /**
     * @return bool
     */
    public function hasId(): bool;

    /**
     * @return string
     */
    public static function getCreateTableQuery(): string;


}