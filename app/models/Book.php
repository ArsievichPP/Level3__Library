<?php

namespace app\models;

use app\core\Model;

class Book extends Model
{
    /**
     * Get a book by its id or empty array
     * @param $book_id
     * @return array book dataset
     */
    public function getBook($book_id)
    {
        if (USE_ONE_TABLE) {
            $this->table = 'books_authors';
            $res = $this->findOne($book_id);
            if ($res[0]['deleted'] == null) {
                return $res;
            }
        } else {
            $sql = "SELECT books.id, book_name, GROUP_CONCAT(name_author SEPARATOR ', ') as 'author' , year, num_pages, about_book, deleted, views, clicks, image
                    FROM `books`
                    INNER JOIN `relations` ON books.id = book_id
                    INNER JOIN `authors` ON authors.id = relations.author_id
                    WHERE books.id = ?
                    GROUP by books.id";
            return $this->findBySql($sql, [$book_id]);
        }
        return [];
    }

    /**
     * increases the view value of the specified book
     * @param $book_id - for increase value
     */
    public function increaseViews($book_id)
    {
        if (USE_ONE_TABLE) {
            $sql = 'UPDATE books_authors SET views = views + 1 WHERE books_authors.id = ?';
        } else {
            $sql = 'UPDATE books SET views = views + 1 WHERE books.id = ?';
        }
        $this->findBySql($sql, [$book_id]);

    }

    /**
     * increases the click value of the specified book
     */
    public function increaseClicks()
    {
        $id = $_POST['id'];
        if (USE_ONE_TABLE) {
            $sql = 'UPDATE books_authors SET clicks = clicks + 1 WHERE books_authors.id = ?';
        } else {
            $sql = 'UPDATE books SET clicks = clicks + 1 WHERE books.id = ?';
        }
        $this->findBySql($sql, [$id]);
    }

}