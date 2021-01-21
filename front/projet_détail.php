<?php 

include_once("../include/header.php");
include_once("../include/connexionbdd.php");

$nom_projet = $_GET['nom_projet'];

$result = $pdo->prepare("SELECT * FROM projet WHERE nom_projet = :nom_projet");
$result->execute(array('nom_projet' => $nom_projet));
$lignes = $result->fetch();

$element_affichage = "detail_projet";
if($_SESSION["etat"] != TRUE) {
  include_once("../include/affichage.php");
}else{
  include_once("../include/affichage_connecte.php");
}

include_once("../include/footer.php");
