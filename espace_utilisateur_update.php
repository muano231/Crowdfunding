<?php 
session_start();
include_once('connexionbdd.php');

if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password'])){
    echo "tous les champs obligatoire";
    var_dump($_POST['nom']);
    exit;

}

 
// Attribution des variable de la methode POST 
$id = $_SESSION['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$email = $_POST['email'];
$password_utilisateur = $_POST['password'];

// Requête préparé avec les paramètres nommés
$stmt = $pdo->prepare("UPDATE utilisateur  SET utilisateur_nom = :nom, utilisateur_prenom = :prenom, utilisateur_login = :login_user,
                                                     utilisateur_email = :email, utilisateur_password = :pass WHERE utilisateur_id = :id");
$stmt->execute(array(
    'nom'=> $nom,
    'prenom'=> $prenom,
    'login_user'=> $login,
    'email'=> $email,
    'pass'=> $password_utilisateur,
    'id' => $id
));


header( "refresh:0.2;url=espace_utilisateur.php" );
