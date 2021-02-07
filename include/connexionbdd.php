<?php 


// Connexion à la base de données
$dsn = 'mysql:dbname=Projet_Crowdfunding;host=127.0.0.1;charset=utf8mb4';
$user = 'Projet_Crowdfunding';
$password = 'iR6vwkMLEksk3Wt8';


// Test de conexion à la base de données 
try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}