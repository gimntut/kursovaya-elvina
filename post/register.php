<?php
require_once('../db.php');
$sql = 'SELECT id FROM users WHERE login=?;';
$stmt = do_query($sql, [$_POST['name']]);
$data = $stmt->fetchAll();
if (count($data) == 1) {
    header('Location: /register.php?error=Пользователь+с+таким+именем+уже+зарегистрирован', true, 302);
    die();
}
$stmt->closeCursor();
$sql = 'INSERT INTO users (login, password) VALUES(?,?);';
$stmt = do_query($sql, [$_POST['name'], $_POST['password']]);
$stmt->closeCursor();
header('Location: /login.php', true, 302);
