<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once('db.php');
	$sql = 'INSERT INTO users (login, password) VALUES(?,?);';
	$stmt = do_query($sql, [$_POST['name'], $_POST['password']]);
	header('Location: /login.php', true, 302);
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
				<input type="submit" value="Зарестрироваться">
			</div>
		</form>
	</body>

	</html>
<?php
}
