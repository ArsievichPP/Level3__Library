<?php
require_once '../config/settings.php';
try {
    //connect
    $db = require '../config/configDB.php';
    $pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $db['options']);

    if (USE_ONE_TABLE) {
        $command = "DELETE books_authors FROM books_authors WHERE books_authors.deleted < NOW()";
    } else {
        // delete rows in books table and relation table (author not deleted)
        $command = "DELETE books, relations
                FROM books JOIN relations ON relations.book_id = books.id
                WHERE books.deleted < NOW()";
    }

    $pdo->exec($command);
    echo 'books was deleted';

} catch (PDOException $e) {
    echo 'error!';
}



