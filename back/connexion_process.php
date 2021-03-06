<?php 


include_once('../include/connexionbdd.php');
$login = $_POST['login'];
$password = $_POST['password'];
$hash_mdp = sha1 ($password);

//Récupération du pseudo et du mdp haché
$stmt = $pdo->prepare('SELECT id, login, mot_de_passe, solde FROM utilisateur WHERE login = :login_user');
$stmt->execute(array(
    'login_user' => $login));
$resultat = $stmt->fetch();

if($hash_mdp == $resultat['mot_de_passe']){
    $isPasswordCorrect = true;

}else{
    $idPasswordCorrect = false;
}


//Vérification des identifiants de connexion
if ($resultat && $isPasswordCorrect){
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['login'] = $login;
    $_SESSION['solde'] = $resultat['solde'];
    if (isset($GLOBALS['link'])){
        $location = $GLOBALS['link'];
        header( "Location:".$location );
    }

    header( "Location:../front/index.php" );
}else{
    echo '<p class="mb-0">Mauvais identifiant ou mdp ! <a href="../front/connexion.php" class="alert-link">Retouner sur la page de connexion</a>.</p>';
}