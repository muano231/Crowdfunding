<?php 
session_start();
include_once('connexionbdd.php');
$projet_id = $_POST['id'];
$utilisateur_id = $_POST['utilisateur_id'];

$stmt = $pdo->prepare("DELETE FROM projet WHERE id = :projet_id AND utilisateur_id = :utilisateur_id");
$stmt->execute(array(
    'projet_id' => $projet_id,
    'utilisateur_id' => $utilisateur_id
));

header( "Location:espace_utilisateur.php" );
?>