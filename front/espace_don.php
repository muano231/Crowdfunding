<?php

include_once('../include/header.php');
include_once('../include/connexionbdd.php');

if(!isset($_SESSION["id"])) {
    header("Location:connexion.php");
}
$nom_projet = $_GET['projet'];
/*
$req = $pdo->prepare("SELECT utilisateur_id, nom_projet, description_projet, date_creation, date_butoir, objectif FROM projet WHERE nom_projet = :nom_projet");
$req->execute(array(
    'nom_projet' => $nom_projet));
$infos = $req->fetch();
*/
$req = $pdo->prepare("SELECT DISTINCT * FROM projet WHERE nom_projet = :nom_projet");
$req->execute(array(
    'nom_projet' => $nom_projet));
$infos = $req->fetch();

echo $nom_projet;
print_r($infos);
?>
<div class="card mb-3" style="max-width: 1010px;margin-left:150px;margin-top:50px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://source.unsplash.com/random/300x600">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Donner pour le projet : <?php echo $infos['nom_projet'] ?></h5>
                <form action="../back/don_process.php" method="post">
                    <a>Description du projet : <?php echo $infos['description_projet'] ?></a>
                    <br>
                    <a>Montant à atteindre : <?php echo $infos['objectif'] ?></a>
                    <br>
                    <label class="form-label" for="montant">Donner :</label>
                    <input class="form-control" type="text" name="montant" id="montant" required/>
                    <input class="form-control" type="hidden" name="projet_id" id="projet_id"
                            value="<?php echo $id; ?>"/>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Faire le don" />
                </form>
            </div>
        </div>
    </div>
</div>