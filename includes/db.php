<?php
if ((@include "../inc/dbinfo.inc") === false) {
    $sn = '127.0.0.1';
    $db = 'mhwdatabase';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';
} else {
    $sn = DB_SERVER;
    $db = DB_DATABASE;
    $user = DB_USERNAME;
    $pass = DB_PASSWORD;
    $charset = 'utf8mb4';
}

$dsn = "mysql:host=$sn;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);
