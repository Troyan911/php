<?php

require_once ("ParentClass.php");
require_once ("ChildClass.php");

$parent = new ParentClass();
$parent->printText($parent->getText());

$child = new ChildClass();
$child->printText($child->getText());