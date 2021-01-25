<?php

include_once('../include/header.php');
include_once('../include/connexionbdd.php');

$id = $_SESSION['id'];


// récupération des projets de l'utilisateur connecté
$result = $pdo->prepare("SELECT * FROM projet WHERE utilisateur_id = :id ORDER BY date_butoir ASC");
$result->execute(array('id' => $id));
//$nb_lignes = $stmt2->fetch();

while($lignes = $result->fetch()){
    ?>
    <div class="card mb-3" style="max-width: 1010px;margin-left:150px;margin-top:50px;">

    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://source.unsplash.com/random/300x600">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Modifier mon projet</h5>
                <form action="../back/espace_utilisateur_update_projet.php" method="post">
                <input type="hidden" name="projet_id" id="projet_id" value="<?php echo($lignes['id']); ?>"/>
                    <label class="form-label" for="projet_nom">Nom du projet :</label>
                    <input class="form-control" type="text" name="projet_nom" id="projet_nom"
                        value="<?php echo($lignes['nom_projet']); ?>" />

                    <label class="form-label" for="projet_description">Description du projet</label>
                    <input class="form-control" type="text" name="projet_description" id="projet_description"
                        value="<?php echo($lignes['description_projet']); ?>" />

                    <label class="form-label" for="">Date butoir</label>
                    <input class="form-control" type="text" name="" id=""
                        value="<?php echo($lignes['date_butoir']); ?>" disabled />

                    <label class="form-label" for="email">Objectif :</label>
                    <input class="form-control" type="number" name="email" id="email"
                        value="<?php echo($lignes['objectif']); ?>" disabled />

                    <br>
                    <input class="btn btn-primary" type="submit" value="Modifier" />
                </form>
                <br/>
                <form action="confirmation_suppression.php" method="post">
                    <input class="form-control" type="hidden" name="id" id="id"
                        value="<?php echo($lignes['id']); ?>" />
                    <input class="btn btn-danger" type="submit" value="Supprimer le projet" />
                </form>  
            </div>
        </div>
    </div>

    </div>
    <?php
}


?>



<?php



