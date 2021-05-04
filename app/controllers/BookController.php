<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Book;

/**
 * Class BookController
 * Processes user actions on the Book page
 * @package app\controllers
 */
class BookController extends Controller
{

    public function index()
    {
        $model = new Book();
        $data = $model->getBook($this->route['book_id']);
        $model->increaseViews($data[0]['id']); //increase the number of views
        $this->setData($data);
    }

    /**
     * increase the number of clicks on this book
     */
    public function increaseClicks()
    {
        $model = new Book();
        $model->increaseClicks();
    }
}