<?php

namespace app\models;

use app\core\Model;

class Books extends Model
{
    private int $limit = SUM_BOOK_MAIN; //sum books on page

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
                    INNER JOIN relations ON book_id = books.id
                    INNER JOIN authors ON authors.id = author_id
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
        if (USE_ONE_TABLE){
            $sql = "SELECT COUNT(*) as sum FROM $this->table WHERE `deleted` is null";
        }else{
            $sql = "SELECT COUNT(DISTINCT book_id) as sum FROM relations";
        }

        $sum = $this->findBySql($sql)[0]['sum'];
        return ceil($sum / $this->limit);
    }

    /**
     * searches for book matches in the database
     * @return array list of books that match the search query
     */
    public function searchBooks()
    {
        $str = $_POST['search'];

        if (USE_ONE_TABLE) {
            $this->table = 'books_authors';
            $sql = "SELECT * FROM $this->table WHERE `deleted` is null and
                                                (`book_name` LIKE :str or
                                                 `author` LIKE :str or
                                                 `year` LIKE :str)";
        }else{
            $sql = "SELECT books.id, book_name, GROUP_CONCAT(name_author SEPARATOR ', ') as 'author' , year, num_pages, about_book, deleted, views, clicks, image
                    FROM books 
                    JOIN relations ON book_id = books.id
                    JOIN authors ON authors.id = author_id
                    WHERE deleted is NULL and (`book_name` LIKE :str or
                                                 `name_author` LIKE :str or
                                                 `year` LIKE :str)                
                    GROUP BY id";
        }

        return $this->pdo->query($sql, ['str' => '%' . $str . '%']);
    }

}