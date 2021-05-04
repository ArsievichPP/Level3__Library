<?php

namespace app\core;

use app\core\DB;

abstract class Model
{

    protected $pdo; //object of connection to the database
    protected $table; // table name from database

    protected $pk = 'id'; // (primary key) | Name of the field to search for matches

    public function __construct()
    {
        $this->pdo = DB::instance(); // connection to database
    }


    /**
     * Returns the first match found from the table
     * @param $inf - information for finding matches
     * @param string $field the name of the search column
     * @return array
     */
    public function findOne($inf, $field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$inf]);
    }

    /**
     * @param $sql string request
     * @param array $params array of parameters
     * @return array result of request
     */
    public function findBySql($sql, $params = []){
        return $this->pdo->query($sql, $params);
    }

    /**
     * working only with params like: [':name', 'value', 'data-type of value']
     * @param $sql string request
     * @param array $bindParams array of parameters
     * @return array result of request
     */
    public function bindAndQuery($sql, array $bindParams){
        return $this->pdo->bindAndQuery($sql, $bindParams);
    }
}