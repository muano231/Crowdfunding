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
$resultat = $result->fetch();

$element_affichage = "lister_projets";

$nom_projet = $resultat['nom_projet'];
?>

<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://source.unsplash.com/random/300x200" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?php echo $nom_projet; ?></h5>
        <p class="card-text"><?php echo($resultat['description_projet']); ?></p>

        <a href="projet_détail.php?nom_projet=<?php echo $nom_projet; ?>" title="Envoyer"><input class="btn btn-primary" type="submit" value="Plus de détails" /></a>
    </div>
</div>
<?php

echo "</div>";

include_once("../include/footer.php");