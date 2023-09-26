<?php
declare(strict_types=1);

require_once "Status.php";

class Task
{
    private int $id;
    private string $name;
    private int $priority;
    private Status $status;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function __construct(int $id, string $name, int $priority, Status $status = Status::Open)
    {
        $this->id = $id;
        $this->name = $name;
        $this->priority = $priority;
        $this->status = $status;
    }


    public function __toString(): string
    {
        return "$this->id#{$this->name}#{$this->priority}#{$this->status->value}";
    }

    public function getTasks(): array //todo
    {
        return true;

    }


    public function complete(): void
    {
//        todo setstatus
        $this->status = Status::Done;
    }


}