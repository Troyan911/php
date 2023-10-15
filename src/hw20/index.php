<?php

require_once "Crud.php";
require_once "Sex.php";
require_once "Users.php";
require_once "Blogs.php";

$rand = rand(18, 55);

$crud = new Crud();

$crud->dropTable(Blogs::class);
$crud->dropTable(Users::class);

$crud->createTable(Users::getCreateTableQuery());
$crud->createTable(Blogs::getCreateTableQuery());

$user = new Users("user_$rand", "email_$rand@email.com", $rand, Sex::MALE);
$crud->insertRow($user);
$crud->displayRow($user);

try {
    $user->setName("new_user_name");
    $user->setEmail("new_user_email@email.com");
} catch (Exception $e) {
    echo $e->getMessage();
}
$crud->updateRow($user);
$crud->displayRow($user);


$blog = new Blogs("title_$rand", "content_$rand", $user->getId());
$crud->insertRow($blog);
$crud->displayRow($blog);

try {
    $blog->setTitle("new_title");
    $blog->setContent("new_content");
} catch (Exception $e) {
    echo $e->getMessage();
}
$crud->displayRow($blog);


$crud->deleteRow($user);
$crud->displayRow($user);
//blog row deleted by foreign key
$crud->displayRow($blog);
