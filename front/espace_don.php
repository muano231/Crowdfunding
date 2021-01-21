<?php

include_once('../include/header.php');
include_once('../include/connexionbdd.php');

if($_SESSION["etat"] != TRUE) {
    echo "Vous n'êtes pas connecté !";
    header("Location:connexion.php");
}
$id = $_POST['id'];

$req = $pdo->prepare("SELECT DISTINCT utilisateur_id, nom_projet, date_creation, date_butoir, objectif FROM projet WHERE nom_projet = :nom_projet");
                        /*
$req = $pdo->prepare("SELECT d.utilisateur_id as utilisateur_id, d.projet_id as projet_id, p.nom_projet as nom_projet, p.description_projet as description_projet, 
                        p.date_creation as date_creation, p.date_butoir as date_butoir, p.objectif as objectif, d.montant as montant, d.date_don as date_don
                        FROM don d
                        JOIN projet p on d.projet_id = p.id
                        WHERE p.nom_projet = :nom_projet");*/
$req->execute(array(
    'nom_projet' => $nom_projet));
$infos = $req->fetch();
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
                
                    <label class="form-label" for="montant">Montant :</label>
                    <input class="form-control" type="text" name="montant" id="montant"/>
                    <a></a>
                    <a>Montant à atteindre : <?php echo $infos['nom_projet'] ?></a>
                    <br>
                    <label class="form-label" for="montant">Donner :</label>
                    <input class="form-control" type="text" name="montant" id="montant"/>
                    <br>
                    <input class="btn btn-primary" type="submit" value="Donner" />
                </form>
            </div>
        </div>
    </div>
</div>