<?php
declare(strict_types=1);

require_once "File.php";
require_once "Task.php";
require_once "FileNotFoundException.php";
require_once "TaskNotFoundException.php";

class ToDoList
{
    private $tasks;
    private $fileName;
    private $delimiter;

    public function __construct(string $fileName, string $delimiter)
    {
        $this->tasks = $this->readList($fileName);
        $this->fileName = $fileName;
        $this->delimiter = $delimiter;

//        print_r($this->tasks);
    }

    public function addTask(string $name, int $priority): void
    {
        $newId = array_key_last($this->tasks) + 1;
        $this->tasks[$newId] = new Task($newId, $name, $priority);
        $this->saveList($this->fileName, $this->tasks);
    }

    public function deleteTask(int $taskId): void
    {
        try {
            $this->isTaskExists($taskId);
            unset($this->tasks[$taskId]);
            $this->saveList($this->fileName, $this->tasks);
        }
        catch (TaskNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function completeTask(int $taskId): void
    {
        try {
            $this->isTaskExists($taskId);
            $this->tasks[$taskId]->complete();
            $this->saveList($this->fileName, $this->tasks);
        }
        catch (TaskNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    private function isTaskExists(int $id)
    {
        if (!isset($this->tasks[$id])) {
            throw new TaskNotFoundException($id);
        }
    }


    public function getTasks(): array
    {
        return $this->tasks;
    }

    //todo
    private function sortTaskByPrio(array $tasks) : array {
        return usort($tasks, function ($a, $b) : int {
            return strcmp($a->getPriority, $b->getPriority);
        });
    }

    private function readList(string $fileName): ?array
    {
        try {
            $file = new File($fileName);
            $lines = $file->read();
            foreach ($lines as $line) {
                if (strlen(trim($line)) > 0) {
                    $task = $this->line2task($line);
                    $data[$task->getId()] = $task;
                }
            }
            echo "File read\n";
        } catch (FileNotFoundException $e) {
            echo $e->getMessage();
            exit;
        }
        return $data;
    }

    private function line2task(string $line): ?Task
    {
        $props = explode($this->delimiter, trim($line));
        $id = (int)$props[0];
        $name = $props[1];
        $prio = (int)$props[2];
        $status = Status::from($props[3]);
        return new Task($id, $name, $prio, $status);
    }

    private function tasks2string(array $tasks): string
    {
        return implode("\n", $tasks);
    }

    private function saveList(string $fileName, array $tasks): void
    {
        $data = $this->tasks2string($tasks);
        try {
            $file = new File($fileName);
            if ($file->write($data)) {
                echo "File saved\n";
            }
        } catch (FileNotFoundException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}