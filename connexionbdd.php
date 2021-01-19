<?php 


// Connexion à la base de données
$dsn = 'mysql:dbname=yannfunding;host=127.0.0.1;charset=utf8mb4';
$user = 'yannfunding';
$password = 'LXSiYCDmcBBF8Rxk';


// Test de conexion à la base de données 
try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
