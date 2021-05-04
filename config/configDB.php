<?php

// enter your database config------
$conf_json = file_get_contents('D:\db.conf'); // read file with 'user'=>username and 'pass'=>password for database
$conf = json_decode($conf_json, true);

$host = 'localhost';
$dbname = 'books';
$charset = 'utf8mb4';
$user = $conf['user'];
$pass = $conf['pass'];
//----------------------------------


return array(
    'dsn' => "mysql:host=$host;dbname=$dbname;charset=$charset",
    'user' => $user,
    'pass' => $pass,
    'options' => array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ),
    'host' => $host,
    'dbname' => $dbname
);