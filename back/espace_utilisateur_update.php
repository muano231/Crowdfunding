<?php 
session_start();
include_once('../include/connexionbdd.php');

if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password'])){
    echo "tous les champs obligatoire";
    echo '<p class="mb-0">Mauvais identifiant ou mdp,  <a href="../front/connexion.php" class="alert-link">retouner page de connexion</a>.</p>';
}

 
// Attribution des variable de la methode POST 
$id = $_SESSION['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$email = $_POST['email'];
$password_utilisateur = $_POST['password'];

$hash_mdp = sha1 ($password_utilisateur);


//Requête de vérif si mail déjà utilisé 
$verif = $pdo->prepare("SELECT email, id FROM utilisateur WHERE email = :email");
$verif->execute([
    'email' => $email
]);

$resultat = $verif->fetch();

if(isset($resultat['email']) && $resultat['id'] != $id ){
    echo('Cette adresse email est déja utilisé');
    echo(' Veuillez renseigner une autre adresse email')
    ?>
    <br>
    <a href="/front/inscription.php">Retourner à l'inscription</a>
    <?php
}else{






// Requête préparé avec les paramètres nommés
$stmt = $pdo->prepare("UPDATE utilisateur  SET nom = :nom, prenom = :prenom, login = :login_user, email = :email, mot_de_passe = :pass WHERE id = :id");
$stmt->execute(array(
    'nom'=> $nom,
    'prenom'=> $prenom,
    'login_user'=> $login,
    'email'=> $email,
    'pass'=> $hash_mdp,
    'id' => $id
));


header( "Location:../front/espace_utilisateur.php" );

}
