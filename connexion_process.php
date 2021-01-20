<?php 


include_once('connexionbdd.php');
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


if ($resultat && $isPasswordCorrect){
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['login'] = $login;
    $_SESSION['solde'] = $resultat['solde'];
    header( "Location:index.php" );
}else{
    echo $resultat['mot_de_passe'];
    echo $hash_mdp;
    echo '<p class="mb-0">Mauvais identifiant ou mdp,  <a href="connexion.php" class="alert-link">retouner page de connexion</a>.</p>';
}