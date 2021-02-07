<?php

include_once('../include/header.php');
include_once('../include/connexionbdd.php');

$id_utilisateur = $_SESSION['id'];
$montant = $_POST["montant"];

$stmt = $pdo->prepare('SELECT solde FROM utilisateur WHERE id = :id_utilisateur');
$stmt->execute(array(
    'id_utilisateur' => $id_utilisateur));
$resultat = $stmt->fetch();

$maj_solde = $pdo->prepare("UPDATE utilisateur  SET solde = :solde  WHERE id = :id_utilisateur ");
$maj_solde->execute(array(
    'solde'=> $resultat['solde']+$montant,
    'id_utilisateur'=> $id_utilisateur
));

echo $_SESSION;
var_dump($resultat);
echo $resultat['solde']+$montant;


header("Location:../front/recharger_solde.php");