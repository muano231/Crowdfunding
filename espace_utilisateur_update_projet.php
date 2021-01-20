<?php 
session_start();
include_once('connexionbdd.php');

if (empty($_POST['projet_nom']) || empty($_POST['projet_description'])){
    echo "tous les champs obligatoire";
    echo '<p class="mb-0">Mauvais identifiant ou mdp,  <a href="connexion.php" class="alert-link">retouner page de connexion</a>.</p>';
}

 
// Attribution des variable de la methode POST 
$id = $_SESSION['id'];
$nom = $_POST['projet_nom'];
$description = $_POST['projet_description'];
$id_projet = $_POST['projet_id'];


// Requête préparé avec les paramètres nommés
$stmt = $pdo->prepare("UPDATE projet  SET nom_projet = :nom, description_projet = :description,  WHERE id = :id, utilisateur_id = :id_utilisateur ");
$stmt->execute(array(
    'nom'=> $nom,
    'description'=> $description,
    'id' => $id_projet,
    'id_utilisateur' => $id
));
var_dump($id_projet);
var_dump($stmt);

//header( "Location:espace_utilisateur.php" );


