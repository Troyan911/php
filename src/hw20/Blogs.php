<?php

require_once "CrudFieldsTrait.php";
require_once "CrudInterface.php";
require_once "../hw17/ValidatorTrait.php";

class Blogs implements CrudInterface
{
    use CrudFieldsTrait;
    use ValidatorTrait;

    private string $title;
    private string $content;
    private int $author_id;

    private static string $createTableQuery =
        "create table `blogs`
        (
            `id`         int unsigned auto_increment primary key,
            `title`      char(200)    not null,
            `content`    text         not null,
            `created_at` timestamp    DEFAULT current_timestamp,
            `author_id`  int unsigned not null,
                foreign key (`author_id`) references users (`id`)
                    on update cascade on delete cascade
        );";

    public function __construct(string $title, string $content, string $author_id)
    {
        try {
            $this->setTitle($title);
            $this->setContent($content);
            $this->setAuthorId($author_id);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * @param string $title
     * @return void
     * @throws Exception
     */
    public function setTitle(string $title): void
    {
        $this->isValidText($title, 5);
        $this->title = $title;
    }

    /**
     * @param string $content
     * @return void
     * @throws Exception
     */
    public function setContent(string $content): void
    {
        $this->isValidText($content, 5);
        $this->content = $content;
    }

    /**
     * @param int $author_id
     */
    public function setAuthorId(int $author_id): void
    {
        $this->author_id = $author_id;
    }
}