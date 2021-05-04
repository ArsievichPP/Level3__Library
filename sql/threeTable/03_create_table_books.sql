CREATE TABLE if not exists `books`
(
    `id`         int                                                       NOT NULL,
    `book_name`  varchar(255)                                              NOT NULL,
    `year`       int                                                       NOT NULL,
    `num_pages`  int                                                       NOT NULL,
    `about_book` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    `deleted`    datetime                                                           DEFAULT NULL,
    `views`      int                                                       NOT NULL DEFAULT '0',
    `clicks`     int                                                       NOT NULL DEFAULT '0',
    `image`      varchar(255)                                              NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;


ALTER TABLE `books`
    ADD PRIMARY KEY (`id`);


ALTER TABLE `books`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;