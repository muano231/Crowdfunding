<?php

include_once('../include/header.php');
include_once('../include/connexionbdd.php');

$id_utilisateur = $_SESSION['id'];
$montant = $_POST["montant"];

//Récuparation du solde de l'utilisateur en fonction de l'id de la session
$stmt = $pdo->prepare('SELECT solde FROM utilisateur WHERE id = :id_utilisateur');
$stmt->execute(array(
    'id_utilisateur' => $id_utilisateur));
$resultat = $stmt->fetch();

//Mise à jour du solde avec le montant souhaité 
$maj_solde = $pdo->prepare("UPDATE utilisateur  SET solde = :solde  WHERE id = :id_utilisateur ");
$maj_solde->execute(array(
    'solde'=> $resultat['solde']+$montant,
    'id_utilisateur'=> $id_utilisateur
));



header("Location:../front/recharger_solde.php");