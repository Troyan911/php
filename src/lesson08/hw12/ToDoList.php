<?php
declare(strict_types=1);

require_once "File.php";
require_once "Task.php";
require_once "TaskNotFoundException.php";

class ToDoList
{
    private array $tasks;
    private string $fileName;
    private string $delimiter;

    /**
     * @param string $fileName
     * @param string $delimiter
     */
    public function __construct(string $fileName, string $delimiter)
    {
        $this->fileName = $fileName;
        $this->delimiter = $delimiter;
        $this->tasks = $this->readList($fileName);
    }

    /**
     * @param string $fileName
     * @return array of Task
     */
    private function readList(string $fileName): array
    {
        $data = [];
        try {
            $file = new File($fileName);
            $lines = $file->read();
            foreach ($lines as $line) {
                if (strlen(trim($line)) > 0) {
                    $task = $this->lineToTask($line);
                    $data[$task->getId()] = $task;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $data;
    }

    /**
     * @param string $line
     * @return Task
     */
    private function lineToTask(string $line): Task
    {
        $props = explode($this->delimiter, trim($line));

        $id = (int)$props[0];
        $name = $props[1];
        $prio = (int)$props[2];
        $status = Status::from($props[3]);
        return new Task($id, $name, $prio, $status);
    }

    /**
     * @param string $fileName
     * @param array $tasks
     * @return void
     */
    private function saveList(string $fileName, array $tasks): void
    {
        $data = $this->tasksToString($tasks);
        try {
            $file = new File($fileName);
            if ($file->write($data)) {
                echo "File saved. ";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * @param array $tasks
     * @return string
     */
    private function tasksToString(array $tasks): string
    {
        return implode("\n", $tasks);
    }

    /**
     * @param string $name
     * @param int $priority
     * @return void
     */
    public function addTask(string $name, int $priority): void
    {
        $newId = count($this->tasks) > 0 ? max(array_keys($this->tasks)) + 1 : 0;

        $this->tasks[$newId] = new Task($newId, $name, $priority);
        $this->saveList($this->fileName, $this->tasks);
        echo "Task \"$name\" with id \"$newId\" added\n";
    }

    /**
     * @param int $taskId
     * @return void
     */
    public function deleteTask(int $taskId): void
    {
        echo "Delete task with id $taskId\n";
        try {
            $this->isTaskExists($taskId);
            unset($this->tasks[$taskId]);
            $this->saveList($this->fileName, $this->tasks);
            echo "Task with id \"$taskId\" deleted\n";
        } catch (TaskNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $taskId
     * @return void
     */
    public function completeTask(int $taskId): void
    {
        echo "Complete task with id $taskId\n";

        try {
            $this->isTaskExists($taskId);
            $this->tasks[$taskId]->complete();
            $this->saveList($this->fileName, $this->tasks);
            echo "Task with id \"$taskId\" completed\n";
        } catch (TaskNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return void
     * @throws TaskNotFoundException
     */
    private function isTaskExists(int $id)
    {
        if (!isset($this->tasks[$id])) {
            throw new TaskNotFoundException($id);
        }
    }

    /**
     * @return void
     */
    public function getTasks(): void
    {
        $sortedTasks = $this->sortTaskByPrio($this->tasks);

        Task::printHeader();
        foreach ($sortedTasks as $task) {
            $task->printTask() . PHP_EOL;
        }
    }

    /**
     * @param array $tasks
     * @return array
     */
    private function sortTaskByPrio(array $tasks): array
    {
        usort($tasks, function (Task $a, Task $b): int {
            return $this->intcmp($a->getPriority(), $b->getPriority());
        });
        return $tasks;
    }

    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    function intcmp(int $a, int $b): int
    {
        if ($a == $b) {
            return 0;
        }
        return ($a > $b) ? -1 : 1;
    }
}