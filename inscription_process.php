<?php 
// Vérification de tous les champs du formulaire
if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password'])){
    echo "tous les champs obligatoire";
    exit;

}

 
// Attribution des variable de la methode POST 
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$email = $_POST['email'];
$password_utilisateur = $_POST['password'];


include_once('connexionbdd.php');


// Requête préparé avec les paramètres nommés
$stmt = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, login, mot_de_passe, email, date_inscription, solde)
                    VALUES (:nom, :prenom, :login_user, :pass, :email, NOW(), :solde)");

if($stmt->execute(array(
    ':nom'=> $nom,
    ':prenom'=> $prenom,
    ':login_user'=> $login,
    ':email'=> $email,
    ':pass'=> $password_utilisateur,
    ':solde'=> 40
))){
    header("Location:index.php");
}else{
    echo ("une erreur est survenue");
}