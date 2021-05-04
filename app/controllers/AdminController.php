<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Admin;

/**
 * Class AdminController
 * Processes user actions on the Admin page
 * @package app\controllers
 */
class AdminController extends Controller
{

    public function index()
    {
        if ($this->checkAuth()) {
            $this->layout = 'layout_admin';

            $model = new Admin();
            $data['books'] = $model->getBooks();
            $data['sum_page'] = $model->getSumPages();
            $data['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
            $this->setData($data);
        } else {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Вы не аторизованы!';
            die();
        }
    }

    /**
     * @return bool is the user authorized or not?
     */
    private function checkAuth(): bool
    {
        if (isset($_SERVER['PHP_AUTH_USER'])) {
            $admins = require_once ROOT . '/config/admins.php'; //require the file with usernames and passwords
            $login = $_SERVER['PHP_AUTH_USER'];
            $pass = $_SERVER['PHP_AUTH_PW'];

            if ($admins[$login] === $pass) {
                return true;
            }
        }
        return false;
    }

    /**
     * log out of account
     */
    public function logout()
    {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.1 401 Unauthorized');
        echo 'Вы вышли из аккаунта!';
        die();
    }


    public function addBook()
    {
        $model = new Admin();
        $model->addBookAndAuthor();
        header('location: http://'. HOST_NAME .'/admin');
    }

    public function deleteBook()
    {
        $model = new Admin();
        $model->deleteBook();
        header('location: http://'. HOST_NAME .'/admin');
    }
}