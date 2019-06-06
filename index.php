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
  $logged = $_SESSION['user_id'];
  if ($logged) {
    echo "Привет ${_SESSION['user_name']}<br />" . '<a href="/basket.php">Корзина</a>';
  } else {
    echo '<a href="/login.php">Войти</a>
    <a href="/register.php">Регистрация</a>
    <div>Войдите, чтобы купить</div>';
  }
  echo "<h1>Каталог магазина</h1>";
  require_once('db.php');
  $stmt = $pdo->query('SELECT * FROM catalog'); ?>

  <table>
    <tr>
      <th>Название</th>
      <th>Цена, руб.</th>
      <th>Кнопки</th>
    </tr>
    <?php
    while ($row = $stmt->fetch()) {
      $button = $logged ? "<form action='/post/add_to_basket.php' method='post'>
      <input type='hidden' name=product value=${row['id']}>
      <input type='submit' value='➕'>
      </form>" : '';
      echo "<tr><td>${row['name']}</td>  <td>${row['price']}</td> <td>$button</td></tr>";
    }
    ?>
  </table>
</body>

</html>