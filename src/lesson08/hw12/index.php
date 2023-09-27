<?php
declare(strict_types=1);

require_once "ToDoList.php";

$fileName = "todolist.txt";
$delimiter = "#";

$list = new ToDoList($fileName, $delimiter);

$randNumber = rand(0, 20);
$list->addTask("task" . $randNumber, $randNumber);

$list->deleteTask(rand(0, 20));
$list->completeTask(rand(0, 20));

$list->getTasks();
