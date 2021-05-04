<?php

namespace app\core;

class DB
{

    protected $pdo; // object of connection to the database
    protected static $instance;

    protected function __construct()
    {
        $db = require ROOT . '/config/configDB.php';
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $db['options']);
    }

    /**
     * Creates a data base object and returns a link to it
     * @return DB object
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Executes the request and returns true/false
     * @param $sql string request
     * @param $params array of parameters
     * @return bool result of request
     */
    public function execute($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Executes a request and returns an array of data.
     * If the request has not been completed returns an empty array.
     * @param $sql string request
     * @param array $params array of parameters
     * @return array result data of request
     */
    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if ($res !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }

    /**
     * working only with params like: [':name', 'value', 'data-type of value']
     * @param $sql string request
     * @param $bindParams array of parameters for binding
     * @return array result data of request
     */
    public function bindAndQuery($sql, $bindParams)
    {
        $stmt = $this->pdo->prepare($sql);
        foreach ($bindParams as $params) {
            $stmt->bindParam($params[0], $params[1], $params[2]);
        }
        $res = $stmt->execute();

        return $res ? $stmt->fetchAll() : [];
    }

}