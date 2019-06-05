<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('db.php');
    $sql = 'SELECT id FROM users WHERE login=? AND password=?';
    $stmt = do_query($sql, [$_POST['name'], $_POST['password']]);
    $data = $stmt->fetchAll();
    if (count($data) == 1) {
        header('Location: /', true, 302);
        $_SESSION['user_name'] = $_POST['name'];
        $_SESSION['user_id'] = $data[0]['id'];
    } else {
        header('Location: /login.php', true, 302);
    }
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
    </head>

    <body>
        <form method="post">
            <div>
                <label for="name">Логин</label>
                <input id="name" type="text" name="name">
            </div>
            <div>
                <label for="password">Пароль</label>
                <input id="password" type="text" name="password">
            </div>
            <div>
                <input type="submit" value="Войти">
            </div>
        </form>
    </body>

    </html>
<?php
}
