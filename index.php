<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Каталог магазина</title>
</head>

<body>
  <?php
  session_start();
  if ($_SESSION['user_id']) {
    echo "Привет ${_SESSION['user_name']}";
  } else {
    echo '<a href="/login.php">Войти</a>';
    echo '<a href="/register.php">Регистрация</a>';
  }
  ?>
  <a href="/card.php">Корзина</a>
  <?php
  require_once('db.php');
  $stmt = $pdo->query('SELECT name, price FROM catalog'); ?>

  <table>
    <tr>
      <th>Название</th>
      <th>Цена, руб.</th>
      <th>Кнопки</th>
    </tr>
    <?php
    while ($row = $stmt->fetch()) {
      echo "<tr> <td>${row['name']}</td>  <td>${row['price']}</td><td></td></tr>";
    } ?>
  </table>
</body>

</html>