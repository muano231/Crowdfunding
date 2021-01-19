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
$stmt = $pdo->prepare("INSERT INTO utilisateur (utilisateur_nom, utilisateur_prenom, utilisateur_login, utilisateur_email, 
                                                utilisateur_password, utilisateur_date_inscription, utilisateur_solde) 
                                                VALUES (:nom, :prenom, :login_user, :email, :pass, NOW(), :solde)");
$stmt->execute(array(
    'nom'=> $nom,
    'prenom'=> $prenom,
    'login_user'=> $login,
    'email'=> $email,
    'pass'=> $password_utilisateur,
    'solde'=> 40
));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <?php
     if(!$stmt){
         echo ("une erreur est survenue");
     }else{
        header( "refresh:0.2;url=index.php" );
     }
    ?>
<br>
    <a href="index.php">Retour à l'accueil</a>
</body>

</html>