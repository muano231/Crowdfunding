<?php 
session_start();
include_once('../include/connexionbdd.php');


// Vérification de l'existance de tous les paramètres
if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['email'])){
    echo "tous les champs obligatoire";
    echo '<p class="mb-0">Mauvais identifiant ou mdp,  <a href="../front/connexion.php" class="alert-link">retouner page de connexion</a>.</p>';
    exit;
}


//Attribution des variable de la methode POST 
$id = $_SESSION['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$email = $_POST['email'];


//Requête de vérif si mail déjà utilisé 
$verif = $pdo->prepare("SELECT email, id FROM utilisateur WHERE email = :email");
$verif->execute([
    'email' => $email
]);
$resultat = $verif->fetch();


//Vérification pour voir si l'email est déjà utilisé sur un autre id
if(isset($resultat['email']) && $resultat['id'] != $id ){
    echo('Cette adresse email est déja utilisé');
    echo(' Veuillez renseigner une autre adresse email ou laisser la votre tel qu\'elle ');
    echo('<br><a href="../front/espace_utilisateur.php">Retourner à votre espace</a>');
    exit;
}


// Requête préparé avec les paramètres nommés
$stmt = $pdo->prepare("UPDATE utilisateur  SET nom = :nom, prenom = :prenom, login = :login_user, email = :email WHERE id = :id");
$stmt->execute(array(
    'nom'=> $nom,
    'prenom'=> $prenom,
    'login_user'=> $login,
    'email'=> $email,
    'id' => $id
));


//Retour sur l'espace utilisateur
header( "Location:../front/espace_utilisateur.php" );
