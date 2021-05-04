<?php

namespace app\models;

use app\core\DB;
use app\core\Model;


class Admin extends Model
{
    private $limit = SUM_BOOK_ADMIN; //sum books on page

    /**
     * Get a list of all books not deleted from the database
     * @return array list of all books
     */
    public function getBooks()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $this->limit = isset($_GET['limit']) ? $_GET['limit'] : $this->limit;
        $offset = $this->limit * ($page - 1);


        if (USE_ONE_TABLE) {
            $this->table = 'books_authors';
            $sql = "SELECT * FROM $this->table WHERE `deleted` is NULL LIMIT :limit OFFSET :offset";
        } else {
            $this->table = 'relations';
            $sql = "SELECT books.id, book_name, GROUP_CONCAT(name_author SEPARATOR ', ') as 'author' , year, num_pages, about_book, deleted, views, clicks, image
                    FROM books 
                    JOIN relations ON book_id = books.id
                    JOIN authors ON authors.id = author_id
                    WHERE deleted is NULL                     
                    GROUP BY id
                    LIMIT :limit OFFSET :offset";
        }

        $params = [
            [":limit", $this->limit, \PDO::PARAM_INT],
            [":offset", $offset, \PDO::PARAM_INT]
        ];
        return $this->bindAndQuery($sql, $params);
    }

    /**
     * get the number of pages with books
     * @return number of pages or false
     */
    public function getSumPages()
    {
        if (USE_ONE_TABLE) {
            $sql = "SELECT COUNT(*) as sum FROM $this->table WHERE `deleted` is null";
        } else {
            $sql = "SELECT COUNT(DISTINCT book_id) as sum
                    FROM relations
                    JOIN books ON books.id = relations.book_id
                    WHERE deleted is null";
        }

        $sum = $this->findBySql($sql)[0]['sum'];
        return ceil($sum / $this->limit);
    }

    /**
     * adds authors and a book to the database if all data is available
     */
    public function addBookAndAuthor()
    {
        if (($params = $this->checkVarForAdding()) && $this->saveImage()) {
            if (USE_ONE_TABLE) {
                $sql = 'INSERT INTO `books_authors` (`book_name`, `author`, `year`, `num_pages`, `about_book`, `image`)
                            VALUES (?, ?, ?, "253", ?, ?)';
                $this->findBySql($sql, $params);
            } else {
                $this->addAuthor($params['authors']);
                $this->addBook($params['book']);
                $this->addRelations($params['book'][0], $params['authors']);
            }
        }
    }


    /**
     * Checks incoming data to add a new book
     * @return array data array or empty array
     */
    private function checkVarForAdding(): array
    {
        if (isset($_POST) && isset($_FILES)) {
            if (USE_ONE_TABLE) {
                if ($_POST['book_name'] && $_POST['author_1'] && $_POST['year'] && $_POST['about_book'] && $_FILES['image']['name']) {
                    return [$_POST['book_name'], $_POST['author_1'], $_POST['year'], $_POST['about_book'], $_FILES['image']['name']];
                }
            } else {
                $result = array();
                if ($_POST['book_name'] && $_POST['year'] && $_POST['about_book'] && $_FILES['image']['name']) {
                    $result['book'] = [$_POST['book_name'], $_POST['year'], $_POST['about_book'], $_FILES['image']['name']];

                    for ($i = 1; $i <= 3; $i++) {
                        if ($_POST['author_' . $i] != "") {
                            $result['authors'][] = $_POST['author_' . $i];
                        }
                    }
                }
                return $result;
            }
        }
        return [];
    }

    /**
     * add authors to the database
     * @param array $authors
     */
    private function addAuthor(array $authors)
    {
        $checkSQL = "SELECT Count(id) as 'bool' FROM authors WHERE name_author = ?";
        $sql = "INSERT INTO `authors` (`name_author`) VALUES (?)";
        foreach ($authors as $author) {
            if (!$this->findBySql($checkSQL, [$author])[0]['bool']) {
                $this->findBySql($sql, [$author]);
            }
        }
    }

    /**
     * add book to the database
     * @param $params
     */
    private function addBook($params)
    {
        $sql = 'INSERT INTO `books` (`book_name`, `year`, `num_pages`, `about_book`, `image`)
                            VALUES (?, ?, "253", ?, ?)';
        $this->findBySql($sql, $params);
    }

    /**
     * creates relation between the book and the authors
     * @param $book_name
     * @param array $authors_names
     */
    private function addRelations($book_name, $authors_names)
    {
        $book_id = $this->findBySql("SELECT max(id) as 'id' FROM books WHERE book_name = $book_name")[0]['id'];
        $sqlGetAuthId = "SELECT id FROM authors where name_author = ?";
        $sqlAddRelation = "INSERT INTO relations(book_id, author_id) VALUES (?, ?)";
        foreach ($authors_names as $author) {
            $author_id = $this->findBySql($sqlGetAuthId, [$author])[0]['id'];
            $this->findBySql($sqlAddRelation, [$book_id, $author_id]);
        }
    }

    /**
     * keeps the image and return true/false
     * @return bool
     */
    private function saveImage()
    {
        $name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        return move_uploaded_file($tmp_name, 'images/' . $name);
    }

    /**
     * Marks the book as deleted and sets the time when the book will be deleted
     */
    public function deleteBook()
    {
        $id = $_POST['id'];
        $time = DELETE_AFTER;
        if (USE_ONE_TABLE) {
            $sql = "UPDATE `books_authors` SET `deleted` = DATE_ADD(NOW(), interval $time HOUR) WHERE `id` = ?";
        } else {
            $sql = "UPDATE `books` SET `deleted` = DATE_ADD(NOW(), interval $time HOUR) WHERE `id` = ?";
        }
        $this->findBySql($sql, [$id]);

    }


}