<?php
include_once('../include/connexionbdd.php');
session_start();
$montant = $_POST['montant'];
$projet_id = $_POST['projet_id'];
$id_utilisateur = $_SESSION['id'];
$solde = $_SESSION['solde'];

if ($montant == 0 && isset($projet_id)){
    echo "Il faut entrer un montant pour effectuer un don "."<a href='../front/espace_don.php?projet=".$projet_id."'>Retourner à la page donnation du produit.</a>";
    exit;
}elseif($solde <= $montant){
    echo "Votre solde est insuffisant, il faut le recharger "."<a href='../front/espace_don.php?projet=".$projet_id."'>Retourner à la page donnation du produit.</a>";
    exit;
}

//echo $id_utilisateur.$projet_id.$montant;

$stmt = $pdo->prepare("INSERT INTO don (utilisateur_id, projet_id, montant, date_don)
                    VALUES (:utilisateur_id, :projet_id, :montant, NOW())");

if($stmt->execute(array(
    ':utilisateur_id'=> $id_utilisateur,
    ':projet_id'=> $projet_id,
    ':montant'=> $montant
))){
    header( "Location:../front/connexion.php" );
}else{
    echo ("une erreur est survenue");
}
