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
  $logged=$_SESSION['user_id'];
  if ($logged) {
    echo "Привет ${_SESSION['user_name']}<br />" . '<a href="/card.php">Корзина</a>';
  } else {
    echo '<a href="/login.php">Войти</a>
    <a href="/register.php">Регистрация</a>
    <div>Войдите, чтобы купить</div>';
  }
  ?>
  <h1>Каталог магазина</h1>
  <?php
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
      $button=$logged ?"<a href='/basket/add.php?product=${row['id']}'>➕</a>":'';
      echo "<tr> <td>${row['name']}</td>  <td>${row['price']}</td><td>$button</td></tr>";
    } 
    $stmt->closeCursor();
    ?>
  </table>
</body>

</html>
