CREATE TABLE if not exists `books`.`relations`
(
    `id`        INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
    `book_id`   INT(11) NOT NULL,
    `author_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  CHARSET = utf8
  COLLATE utf8_general_ci;

ALTER TABLE `relations`
    ADD FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
ALTER TABLE `relations`
    ADD FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

