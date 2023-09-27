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
     * @param int $id
     * @param string $name
     * @param int $priority
     * @param Status $status
     */
    public function __construct(int $id, string $name, int $priority, Status $status = Status::Open)
    {
        $this->id = $id;
        $this->name = $name;
        $this->priority = $priority;
        $this->status = $status;
    }

    /**
     * @return void
     */
    public function complete(): void
    {
        $this->status = Status::Done;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "$this->id#{$this->name}#{$this->priority}#{$this->status->value}";
    }

    /**
     * @return void
     */
    public static function printHeader(): void
    {
        printf("%4s\t%-20s%-5s\t%-10s\n", "Id", "Name", "Priority", "Status");
    }

    /**
     * @return void
     */
    public function printTask(): void
    {
        printf("%4d\t%-20s%-5d\t%-10s\n", $this->id, $this->name, $this->priority, $this->status->value);
    }
}