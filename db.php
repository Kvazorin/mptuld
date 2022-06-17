<?php
    $host = 'localhost';
    $dbname = 'mptuld';
    $username = 'root';
    $password = '';
try {
    $pdo= new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "Подключение не удалось:" . $e->getMessage();
}
?>

