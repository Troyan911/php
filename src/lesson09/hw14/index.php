<?php

require_once ("ParentClass.php");
require_once ("ChildClass.php");

$parent = new ParentClass();
$parent->print();

$child = new ChildClass();
$child->print();