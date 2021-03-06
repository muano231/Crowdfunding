<?php 

include_once("../include/header.php");
include_once("../include/connexionbdd.php");

$nom_projet = $_GET['nom_projet'];
$element_affichage = "detail_projet";

//Récupération de toute les informations liées au nom du projet   
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
$date_butoir_testif = $lignes['date_butoir'];
$date_butoir = explode( " ", $lignes['date_butoir']);
list ($year, $month, $day) = explode("-", $date_butoir[0]);
$date_actuelle = date("Y-m-d H:i:s");

//Exploitation de toute les données récupérées avec la requête
if (!isset($montant)){
  $montant = 0;
}
$pourcentage = ($montant/$lignes['objectif'])*100;
?>

<div class="card" style="width: 19rem;">
    <img class="card-img-top" src="https://source.unsplash.com/random/300x200" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?php echo($lignes['nom_projet']); ?></h5>
        <p class="card-text"><?php echo($lignes['description_projet']); ?></p>
        <p class="card-text">Objectif : <?php echo$montant."/".($lignes['objectif']); ?></p>
        <p class="card-text">Date Butoire  : <?php echo ($day."/".$month."/".$year." à ".$date_butoir[1]); ?></p>
        
        
        <?php 
        if(!isset($_SESSION["id"])) {
          $value = "../front/projet_detail.php?nom_projet=".$nom_projet;
          $GLOBALS['link'] = $value;
          echo "<a href='../front/connexion.php' class='btn btn-primary'>Connectez-Vous pour Donner</a>";
        
        }elseif($_SESSION["id"]== $lignes['utilisateur_id']){

          echo "<a class='btn btn-primary bg-warning'>Impossible de donner sur votre projet</a>";
          exit;
        

        }elseif($date_butoir_testif <= $date_actuelle){ ?>
          <div class="progress">
            <div class="progress-bar progress-bar-striped bg-danger " role="progressbar"  aria-valuemin="0" 
                aria-valuemax="100" style="width: <?php echo($pourcentage); ?>%"><?php echo($pourcentage); ?>%</div>
          </div>
          <br>

          <?php echo "<a class='btn btn-primary bg-danger'>Date butoir du projet atteinte</a>";
          exit;
        

        }elseif($pourcentage >= 100){ ?>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success " role="progressbar"  aria-valuemin="0" 
              aria-valuemax="100" style="width: <?php echo($pourcentage); ?>%"><?php echo($pourcentage); ?>%</div>
          </div>
          <br>

           <?php echo "<a href='../front/espace_don.php?projet= ". $project_id. "' class='btn btn-primary bg-success'>Objectif atteint, continuer de donner</a>";
        exit;

        
        }else{ ?>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  aria-valuemin="0" 
                aria-valuemax="100" style="width: <?php echo($pourcentage); ?>%"><?php echo($pourcentage); ?>%</div>
        </div>
        <br>

         <?php echo "<a href='../front/espace_don.php?projet= ". $project_id. "' class='btn btn-primary '>Faire Un Don</a>";
        }
        ?>
    </div>
</div>

<?php

include_once("../include/footer.php");
