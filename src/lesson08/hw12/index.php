<?php
declare(strict_types=1);

require_once "Config.php";
require_once "ToDoList.php";


$fileName = "todolist.txt";
$separator = "#";

$todoList = new ToDoList($fileName);

$todoList->addTask("new task from index file", 777);
$todoList->deleteTask(8);
$todoList->completeTask(15);