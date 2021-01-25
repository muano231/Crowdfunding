<?php 
include_once("../include/connexionbdd.php");
include_once("../include/header.php");


?>

<div class="titre shadow-lg p-3 mb-5 bg-white rounded border border-5">
    <h1>Bienvenue sur le meilleur site de crowdfunding de la terre</h1>
    <h2>Voici tout les projets en cours </h2>

    <?php 
        if(isset($_SESSION['id']) AND isset($_SESSION['login'])){
        }else{
            ?>
    <a class="btn btn-primary" href="connexion.php">Se connecter</a>
    <?php
        }    
            ?>

    <?php 

$result = $pdo->prepare("SELECT * FROM projet WHERE DATEDIFF( date_butoir, DATE( NOW() ) )>=0 ORDER BY date_butoir ASC");
$result->execute(array());

$element_affichage = "lister_projets";

if($_SESSION["id"] != TRUE) {
    include_once("../include/affichage.php");
}else{
    include_once("../include/affichage_connecte.php");
}

echo "</div>";

include_once("../include/footer.php");