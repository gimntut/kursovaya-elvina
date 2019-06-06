<?php
session_start();
if (!$_SESSION['user_id']) {
	header('Location: /login.php', true, 302);
	die();
}
$user_id = $_SESSION['user_id'];
$product = $_POST['product'];
require_once('../db.php');
if ($product) {
	$sql='SELECT * FROM basket WHERE user=? AND product=?';
	$stmt=do_query($sql,[$user_id,$product]);
	$data=$stmt->fetchAll();
	if (count($data)==0) {
		$sql='INSERT INTO basket (user, product, count) VALUES(?, ?, 1)';
		do_query($sql,[$user_id, $product]);
	} else {
		$id = $data[0]['id'];
		$cnt = $data[0]['count'];
		$sql='UPDATE basket set count=? where id=?';
		do_query($sql,[$cnt+1, $id]);
	}
}
header('Location: /basket.php', true, 302);
