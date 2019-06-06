<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
</head>

<body>
	<a href="/">Главная</a> <a href="/login.php">Войти</a>
	<h1>Регистрация</h1>
	<?php if ($_GET['error']) echo "<div class=error>${_GET['error']}</div>"; ?>
	<form method="post" action="/post/register.php">
		<div>
			<label for="name">Логин</label>
			<input id="name" type="text" name="name">
		</div>
		<div>
			<label for="password">Пароль</label>
			<input id="password" type="text" name="password">
		</div>
		<div>
			<input type="submit" value="Зарегистрироваться">
		</div>
	</form>
</body>

</html>