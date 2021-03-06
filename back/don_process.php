<?php
include_once('../include/connexionbdd.php');
session_start();
$montant = $_POST['montant'];
$projet_id = $_POST['projet_id'];
$id_utilisateur = $_SESSION['id'];
$solde = $_SESSION['solde'];

//Vérification des champs remplis et que le solde soit suffisant pour faire un don
if ($montant == 0 && isset($projet_id)){
    echo "Il faut entrer un montant pour effectuer un don "."<a href='../front/espace_don.php?projet=".$projet_id."'>Retourner à la page donnation du produit.</a>";
    exit;
}elseif($solde < $montant){
    echo "Votre solde est insuffisant, il faut le recharger "."<a href='../front/espace_don.php?projet=".$projet_id."'>Retourner à la page donnation du produit.</a>";
    exit;
}

// Ajout du don dans la base de donnée
$stmt = $pdo->prepare("INSERT INTO don (utilisateur_id, projet_id, montant, date_don)
                    VALUES (:utilisateur_id, :projet_id, :montant, NOW())");

if($stmt->execute(array(
    ':utilisateur_id'=> $id_utilisateur,
    ':projet_id'=> $projet_id,
    ':montant'=> $montant
))){
    $_SESSION['solde'] = $solde - $montant;
    $maj_solde = $pdo->prepare("UPDATE utilisateur  SET solde = :solde  WHERE id = :id_utilisateur ");
    $maj_solde->execute(array(
        'solde'=> $_SESSION['solde'],
        'id_utilisateur'=> $id_utilisateur
    ));
    header( "Location:../front/confirmation_donation.php?projet=".$projet_id );
   
}else{
    echo("Vous avez déjà fais un don pour ce projet. Vous ne pouvez plus en faire. Vous allez être rediriger sur la page des projets.");
    header('Refresh: 2; url=../front/index.php');

}
