<?php 

include_once('connexionbdd.php');
session_start();
// Attribution des variable de la methode POST 
$id = $_SESSION['id'];
$projet_nom = $_POST['projet_nom'];
$projet_description = $_POST['projet_description'];
$projet_date_butoire = $_POST['projet_date_butoire'];
$projet_objectif = $_POST['projet_objectif'];



include_once('connexionbdd.php');


// Requête préparé avec les paramètres nommés
$stmt = $pdo->prepare("INSERT INTO projet (utilisateur_id, projet_nom, projet_description, projet_date_creation, projet_date_butoir, 
                                                projet_objectif) 
                                                VALUES (:id, :projet_nom, :projet_description, NOW(), :projet_date_butoire, :projet_objectif)");
$stmt->execute(array(
    'id' => $id,
    'projet_nom' => $projet_nom,
    'projet_description' => $projet_description,
    'projet_date_butoire' => $projet_date_butoire,
    'projet_objectif' => $projet_objectif
));

if(!$stmt){
    echo ("une erreur est survenue");
}else{
    header( "refresh:0.2;url=espace_utilisateur.php" );
}



?>

