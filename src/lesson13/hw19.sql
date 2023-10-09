# DROP TABLE `orders`;
# DROP TABLE `item`;

CREATE TABLE `item`
(
    `id`          INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `name`        CHAR(50)                           NOT NULL,
    `description` MEDIUMTEXT NULL,
    `price`       FLOAT(10) UNSIGNED NOT NULL,
    `stock`       SMALLINT UNSIGNED NOT NULL,
    `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `deleted_at`  DATETIME NULL
);

CREATE TABLE `orders`
(
    `id`           INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `user_id`      INT UNSIGNED NOT NULL,
    `item_id`      INT UNSIGNED NOT NULL,
    `quantity`     SMALLINT UNSIGNED NOT NULL,
    `created_date` DATETIME DEFAULT current_timestamp,
    `status`       ENUM ('new', 'in progress', 'done') DEFAULT 'new',
    `is_payed`     BOOLEAN  DEFAULT FALSE,
    FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE
);

INSERT INTO `item` (`name`, `description`, `price`, `stock`)
VALUES ('item1', 'description1', 101, 201),
       ('item2', 'description2', 102, 202),
       ('item3', 'description3', 103, 203),
       ('item4', 'description4', 104, 204),
       ('item5', 'description5', 105, 205);

INSERT INTO `orders` (`user_id`, `item_id`, `quantity`)
VALUES (1, 1, 10),
       (1, 2, 20),
       (1, 3, 30),
       (1, 4, 40),
       (1, 5, 50),
       (2, 1, 11),
       (2, 2, 22),
       (2, 3, 33);

SELECT *
FROM `orders` `o`
         LEFT JOIN `item` `i` ON `i`.`id` = `o`.`item_id`;


SELECT `o`.`user_id`, COUNT(`o`.`item_id`) `unique_positions`, SUM(`i`.`price` * `o`.`quantity`) `total_cost`
FROM `orders` `o`
         LEFT JOIN `item` `i` on `i`.`id` = `o`.`item_id`
GROUP BY `o`.`user_id`
ORDER BY `total_cost` DESC;


UPDATE `orders` `o`
    LEFT JOIN `item` `i`
on `o`.`item_id` = `i`.`id`
    SET `o`.`status` = 'in progress', `o`.`is_payed` = TRUE
WHERE `i`.`price` = 101;

UPDATE `item`
SET `deleted_at` = CURRENT_TIMESTAMP
WHERE `name` = 'item1';

DELETE
FROM `item`
WHERE `id` = 5;

SELECT *
FROM `orders` `o`
         LEFT JOIN `item` `i` ON `i`.`id` = `o`.`item_id`
