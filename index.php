<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Каталог магазина</title>
</head>
<body>
  <a href="/registr">Регистрация</a>
  <a href="/card">Корзина</a>
  <?php 
    $host = '127.0.0.1';
    $db   = 'magazin';
    $user = 'root';
    $pass = 'o4oVypiU6W0se';
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $stmt = $pdo->query('SELECT name, price FROM catalog'); ?>
    <table>
      <tr>
        <th>Название</th>
        <th>Цена, руб.</th>
      </tr>
    <?php
    while ($row = $stmt->fetch()){ 
        echo "<tr> <td>${row['name']}</td>  <td>${row['price']}</td> </tr>tr>";
     } ?>
     </table>
</body>
</html>