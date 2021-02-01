<?php 
session_start();
include_once('../include/connexionbdd.php');

//Récupération des variables superblobales POST
$id_utilisateur = $_SESSION['id'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$new_password_conf = $_POST['new_password_conf'];


//Hashage des mots de passe
$hash_old_password = sha1 ($old_password);
$hash_new_password = sha1 ($new_password);


//Vérification des variables définies
if (empty($old_password) || empty($new_password) || empty($new_password_conf)){
    echo "tous les champs sont obligatoires";
    echo '<p class="mb-0">Il est impossible de modifier le mot de passe avec un champ vide, <a href="../front/espace_utilisateur.php" class="alert-link">Retourner à mon espace</a>.</p>';
    exit;

}else{

    //Requête de vérif si mail déjà utilisé 
    $verif = $pdo->prepare("SELECT mot_de_passe FROM utilisateur WHERE id = :id");
    $verif->execute([
        'id' => $id_utilisateur
    ]);
    $resultat = $verif->fetch();
    $mdp_bdd = $resultat['mot_de_passe'];

    //Si le nouveau mdp est différent de l'ancien : le modifie
    if($mdp_bdd == $hash_old_password){

        //Vérification que le mdp confirmé corresponde au nouveau mot de passe
        if($new_password != $new_password_conf){
            echo "Les deux mots de passe ne correspondent pas";
            echo '<p class="mb-0">Mauvais identifiant ou mdp,  <a href="../front/espace_utilisateur.php" class="alert-link">Retourner à mon espace</a>.</p>';
            exit;
        }else{
            $stmt = $pdo->prepare("UPDATE utilisateur  SET mot_de_passe = :mot_de_passe WHERE id = :id");
            $stmt->execute(array(
                'mot_de_passe'=> $hash_new_password,
                'id'=> $id_utilisateur
            ));
            header( "Location:../front/espace_utilisateur.php" );
        }
        
    }else{
        echo('Votre ancien mot de passe est incorrect, ');
        echo('Si vous ne vous souvenez pas de votre mot de passe faites mot de passe oublié');
        echo('<br><a href="../front/espace_utilisateur.php">Retourner à mon espace</a>');
        exit;
    }
}
