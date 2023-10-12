<?php

//echo phpinfo();

try {

    $dsn = 'mysql:host=mysql;port:3306;dbname=testdb';
    $user = "root";
    $pswd = "123";

    $connect = new PDO($dsn, $user, $pswd,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $exception) {
    echo $exception->getMessage();
    exit();
}

//$sql = "SELECT * FROM `blogs` WHERE `author_id` = ? AND id = ?";
$sql = "SELECT * FROM `blogs` WHERE `author_id` = :author_id AND id = :id";

$author_id = 3;
$id = 1;

$stmt = $connect->prepare($sql);
$stmt->execute(["author_id" => $author_id, "id" => $id]);

//$stmt = $connect->query($sql);

$blogs = $stmt->fetchAll();

foreach ($blogs as $blog) {
    echo $blog->title . "<br>";
    echo $blog->content . "<br>";
    echo "-------" . "<br>";
}

$blogs = [];
while ($blog = $stmt->fetch()) {
    echo $blog->title . "<br>";
    $blogs[] = $blog;
}

function generatorDB(PDOStatement $stmt): Generator
{
    while ($element = $stmt->fetch()) {
        yield $element;
    }
}

$gene = generatorDB($stmt);
foreach ($gene as $blog) {
    $blog->title . "<br>";
}


//------

$sql = "SELECT * FROM `blogs` WHERE `author_id` IS NOT NULL";
$stmt = $connect->query($sql);
$blogs = $stmt->fetchAll();

//get relations
$blogsId = array_column($blogs, 'id');
$idsString = implode(",", $blogsId);

$sql2 = "SELECT `tag_id` FROM `blogs_tags` WHERE `blog_id` IN ($idsString)";
$stmt = $connect->query($sql2);
$tagIds = [];

while ($column = $stmt->fetchColumn()) {
    $tagIds[] = $column;
}
$idsTagsString = implode(",", $tagIds);
$sql3 = "SELECT * FROM `tags`";
$stmt = $connect->query($sql3);
$tags = $stmt->fetchAll();

foreach ($blogs as $blog) {
    $blogs->tags = [];
//    foreach ($relations as $relation)

}
