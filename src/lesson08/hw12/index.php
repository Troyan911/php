<?php
declare(strict_types=1);

require_once "ToDoList.php";


$fileName = "todolist.txt";
$delimiter = "#";

$todoList = new ToDoList($fileName, $delimiter);

$todoList->addTask("new task from index file", 777);
$todoList->deleteTask(8);
$todoList->completeTask(15);