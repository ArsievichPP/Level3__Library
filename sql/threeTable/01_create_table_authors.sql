CREATE TABLE if not exists `authors`
(
    `id`          int(10)      NOT NULL,
    `name_author` varchar(100) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

ALTER TABLE `authors`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `authors`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

