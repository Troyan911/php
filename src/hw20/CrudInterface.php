<?php

interface CrudInterface
{
    public function getFields(): array;

    public function getId(): int;

    public function setId(int $id): void;

    public function hasId(): bool;

    public static function getCreateTableQuery(): string;


}