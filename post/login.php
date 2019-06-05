<?php
session_start();
require_once('../db.php');
$sql = 'SELECT id FROM users WHERE login=? AND password=?';
$stmt = do_query($sql, [$_POST['name'], $_POST['password']]);
$data = $stmt->fetchAll();
$stmt->closeCursor();
if (count($data) == 1) {
    header('Location: /', true, 302);
    $_SESSION['user_name'] = $_POST['name'];
    $_SESSION['user_id'] = $data[0]['id'];
} else {
    header('Location: /login.php', true, 302);
}
