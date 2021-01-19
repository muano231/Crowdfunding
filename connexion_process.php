<?php 


include_once('connexionbdd.php');
$login = $_POST['login'];

//Récupération du pseudo et du mdp haché
$stmt = $pdo->prepare('SELECT utilisateur_id, utilisateur_login, utilisateur_password FROM utilisateur WHERE utilisateur_login = :login_user');
$stmt->execute(array(
    'login_user' => $login));
$resultat = $stmt->fetch();

if($_POST['password'] == $resultat['utilisateur_password']){
    $isPasswordCorrect = true;

}else{
    $idPasswordCorrect = false;
}
 

if (!$resultat){
    echo ("Mauvais identifiant ou mdpggg");
}else{
    if ($isPasswordCorrect){
        session_start();
        $_SESSION['id'] = $resultat['utilisateur_id'];
        $_SESSION['login'] = $login;
        header( "refresh:0.2;url=index.php" );
        
    }else{
        echo ("Mauvais identifiant ou mdp");
        
        
    }
}