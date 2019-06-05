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
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    if ($stmt->errorCode()*1) {
    	echo "<pre>".$stmt->errorCode()."</pre>";
    	echo "<pre>".print_r($stmt->errorInfo(), true)."</pre>";
    	echo "<pre>".print_r($pdo->errorInfo(), true)."</pre>";
    	die();
    }
    return $stmt;
}

