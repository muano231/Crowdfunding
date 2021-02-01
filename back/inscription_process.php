<?php 
// Vérification de tous les champs du formulaire
if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password'])){
    echo "Veuillez remplir tous les champs pour vous inscrire !";
    echo '<p class="mb-0">Veuillez remplir tous les champs pour vous inscrire ! <a href="../front/inscription.php" class="alert-link">retouner sur la page inscription</a>.</p>';
    exit;
}


// connexion à la base de données
include_once('../include/connexionbdd.php');


// Attribution des variable de la methode POST 
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$email = $_POST['email'];
$password_utilisateur = $_POST['password'];
$password_utilisateur_conf = $_POST['password_conf'];


//Hashage du mot de passe
$hash_mdp = sha1 ($password_utilisateur);


//Vérification si l'email est déjà utilisé
$verif = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
$verif->execute([
    'email' => $email
]);
$resultat = $verif->fetch();

if(isset($resultat['email']) ){
    echo('Cette adresse email est déja utilisé, ');
    echo('Veuillez renseigner une autre adresse email');
    echo('<br><a href="../front/inscription.php">Retourner à l\'inscription</a>');
    exit;
}


//Test si les mots de passe correspondent
if ($password_utilisateur == $password_utilisateur_conf) {
    // Requête préparée avec les paramètres nommés
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

        //Récupération des infos de l'utilisateur
        $req = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $req->execute([
            'email' => $email
        ]);
        $infos = $req->fetch();

        session_start();
        $_SESSION['id'] = $infos['id'];
        $_SESSION['login'] = $infos['login'];
        $_SESSION['solde'] = $infos['solde'];
        header( "Location:../front/index.php" );
    }else{
        echo('Erreur lors d\'ajout des informations dans la base de données');
        echo('<br><a href="../front/inscription.php">Retourner à l\'inscription</a>');
    }
}else{
    echo('Les deux mots de passe ne correspondent pas, ');
    echo('Veuillez à ce qu\'ils correspondent');
    echo('<br><a href="../front/inscription.php">Retourner à l\'inscription</a>');
}