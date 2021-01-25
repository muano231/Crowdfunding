<?php 
session_start();
include_once('../include/connexionbdd.php');

if (empty($_POST['projet_nom']) || empty($_POST['projet_description'])){
    echo '<p class="mb-0">Veuillez renseigner tous les champs pour effectuer une modification ! <a href="../front/espace_utilisateur.php" class="alert-link">retouner sur la page de modification</a>.</p>';
    exit;
}

 
// Attribution des variable de la methode POST 
$id = $_SESSION['id'];
$nom = $_POST['projet_nom'];
$description = $_POST['projet_description'];
$id_projet = $_POST['projet_id'];


// Requête préparé avec les paramètres nommés
$stmt = $pdo->prepare("UPDATE projet  SET nom_projet = :nom, description_projet = :description  WHERE id = :id AND utilisateur_id = :id_utilisateur ");
$stmt->execute(array(
    'nom'=> $nom,
    'description'=> $description,
    'id' => $id_projet,
    'id_utilisateur' => $id
));



header( "Location:../front/espace_utilisateur_projets.php" );


