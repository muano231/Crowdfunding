<?php 
session_start();
include_once('../include/connexionbdd.php');
$projet_id = $_POST['id'];
$utilisateur_id = $_POST['utilisateur_id'];

$stmt = $pdo->prepare("DELETE FROM projet WHERE id = :projet_id AND utilisateur_id = :utilisateur_id");
$stmt->execute(array(
    'projet_id' => $projet_id,
    'utilisateur_id' => $utilisateur_id
));

header( "Location:../front/espace_utilisateur_projets.php" );
?>