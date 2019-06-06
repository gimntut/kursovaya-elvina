<?php
session_start();
if (!$_SESSION['user_id']) {
	header('Location: /login.php', true, 302);
	die();
}
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Корзина</title>
</head>

<body>
	<a href="/">Главная</a><a href=""></a>
<h1>Корзина</h1>
<?php 
	var_export ($print_r);
?>
</body>

</html>