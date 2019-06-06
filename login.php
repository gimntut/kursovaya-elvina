<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>

<body>
<a href="/">Главная</a> <a href="/register.php">Регистрация</a>
<h1>Вход</h1>
    <form method="post" action="/post/login.php">
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
