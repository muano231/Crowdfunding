<?php 

include_once("../include/header.php");
include_once("../include/connexionbdd.php");

$nom_projet = $_GET['nom_projet'];
$element_affichage = "detail_projet";

$result = $pdo->prepare("SELECT p.nom_projet AS nom_projet, p.description_projet AS description_projet, p.date_butoir AS date_butoir, p.objectif AS objectif, p.id AS project_id, 
        u.id AS utilisateur_id, SUM(d.montant) AS montant
        FROM projet p
        LEFT JOIN don d ON p.id = d.projet_id
        JOIN utilisateur u ON p.utilisateur_id = u.id
        WHERE p.nom_projet = :nom_projet
        GROUP BY p.id");
$result->execute(array('nom_projet' => $nom_projet));
$lignes = $result->fetch();
$montant = $lignes['montant'];
$project_id = $lignes['project_id'];
$date_butoir = $lignes['date_butoir'];
$date_actuelle = date("Y-m-d H:i:s");
if (!isset($montant)){
  $montant = 0;
}
$pourcentage = ($montant/$lignes['objectif'])*100;
?>

<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://source.unsplash.com/random/300x200" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?php echo($lignes['nom_projet']); ?></h5>
        <p class="card-text"><?php echo($lignes['description_projet']); ?></p>
        <p class="card-text">OBJECTIF : <?php echo$montant."/".($lignes['objectif']); ?></p>
        <p class="card-text"> DATE BUTOIR : <?php echo($date_butoir); ?></p>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" 
                aria-valuemax="100" style="width: <?php echo($pourcentage); ?>%"></div>
        </div>
        <br>
        <?php
        if(!isset($_SESSION["id"])) {
          $value = "../front/projet_detail.php?nom_projet=".$nom_projet;
          $GLOBALS['link'] = $value;
          echo "<a href='../front/connexion.php' class='btn btn-primary'>Connectez-Vous pour Donner</a>";
        }elseif($date_butoir <= $date_actuelle){
          echo "<a class='btn btn-primary'>Date butoir du projet atteinte</a>";
        }elseif($_SESSION["id"]== $lignes['utilisateur_id']){
          echo "<a class='btn btn-primary'>Impossible de donner sur votre projet</a>";
        }elseif($pourcentage >= 100){
          echo "<a href='../front/espace_don.php?projet= ". $project_id. "' class='btn btn-primary'>Objectif atteint, continuer de donner</a>";
        }else{
          echo "<a href='../front/espace_don.php?projet= ". $project_id. "' class='btn btn-primary'>Faire Un Don</a>";
        }
        ?>
    </div>
</div>

<?php

include_once("../include/footer.php");
