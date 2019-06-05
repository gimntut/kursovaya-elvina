<?php
require_once('config.php');

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

function do_query($sql, $params)
{
    global $pdo;
    $sql = 'SELECT id FROM users WHERE login=? AND password=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

