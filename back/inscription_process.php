<?php 
// Vérification de tous les champs du formulaire
if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password'])){
    //echo "Veuillez remplir tous les champs pour vous inscrire !";
    echo '<p class="mb-0">Veuillez remplir tous les champs pour vous inscrire ! <a href="../front/inscription.php" class="alert-link">retouner sur la page inscription</a>.</p>';
    exit;

}

 
// Attribution des variable de la methode POST 
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$email = $_POST['email'];
$password_utilisateur = $_POST['password'];

$hash_mdp = sha1 ($password_utilisateur);

include_once('../include/connexionbdd.php');


//Requête de vérif si mail déjà utilisé 
$verif = $pdo->query("SELECT email FROM utilisateur WHERE email =".$email);

$resultat = $verif->fetch();
var_dump($resultat);
if(isset($resultat['email']) ){
    echo('Cette adresse email est déja utilisé');
    echo(' Veuillez renseigner une autre adresse email')
    ?>
    <br>
    <a href="/front/inscription.php">Retourner à l'inscription</a>
    <?php
}else{














// Requête préparé avec les paramètres nommés
$stmt = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, login, mot_de_passe, email, date_inscription, solde)
                    VALUES (:nom, :prenom, :login_user, :pass, :email, NOW(), :solde)");

if($stmt->execute(array(
    ':nom'=> $nom,
    ':prenom'=> $prenom,
    ':login_user'=> $login,
    ':email'=> $email,
    ':pass'=> $hash_mdp,
    ':solde'=> 40
))){
 // header( "Location:../front/connexion.php" );
}else{
    echo ("une erreur est survenue");
}

}