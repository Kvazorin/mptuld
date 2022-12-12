<?php
$dsn = 'mysql:dbname=mptuld;host=localhost';
$user = 'root';
$password = '';


try {
	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Ошибка подключения" . $e->getMessage();
	die();
}
