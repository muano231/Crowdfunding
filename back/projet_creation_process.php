<?php 
include_once('../include/connexionbdd.php');
session_start();

if (empty($_POST['projet_nom']) || empty($_POST['projet_description']) || empty($_POST['projet_date_butoir']) || empty($_POST['projet_objectif'])){
    echo "tous les champs obligatoire";
    echo '<p class="mb-0">Mauvais identifiant ou mdp,  <a href="../front/connexion.php" class="alert-link">retouner page de connexion</a>.</p>';
}

// Attribution des variable de la methode POST 
$id = $_SESSION['id'];
$projet_nom = $_POST['projet_nom'];
$projet_description = $_POST['projet_description'];
$projet_date_butoir = $_POST['projet_date_butoir'];
$projet_objectif = $_POST['projet_objectif'];


// Requête préparé avec les paramètres nommés
$stmt = $pdo->prepare("INSERT INTO projet (utilisateur_id, nom_projet, description_projet, date_creation, date_butoir, objectif) 
                       VALUES (:id, :projet_nom, :projet_description, NOW(), :projet_date_butoir, :projet_objectif)");
$stmt->execute(array(
    'id' => $id,
    'projet_nom' => $projet_nom,
    'projet_description' => $projet_description,
    'projet_date_butoir' => $projet_date_butoir,
    'projet_objectif' => $projet_objectif
));

if(!$stmt){
    echo ("une erreur est survenue");
}else{
    header( "Location:../front/espace_utilisateur.php" );
}



?>

