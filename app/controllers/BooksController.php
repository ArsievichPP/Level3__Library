<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Books;

class BooksController extends Controller
{
    public function index()
    {
        $model = new Books();
        $data['books'] = $model->getBooks();
        $data['sum_page'] = $model->getSumPages();
        $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
        $this->setData($data);
    }

    /**
     * search for matches among existing books
     */
    public function search()
    {
        $model = new Books();
        $data['books'] = $model->searchBooks();
        $data['sum_page'] = $model->getSumPages();
        $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
        $this->setData($data);
    }
}