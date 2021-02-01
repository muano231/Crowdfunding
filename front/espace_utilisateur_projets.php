<?php

include_once('../include/header.php');
include_once('../include/connexionbdd.php');

$id = $_SESSION['id'];


// récupération des projets de l'utilisateur connecté
$result = $pdo->prepare("SELECT * FROM projet WHERE utilisateur_id = :id ORDER BY date_butoir ASC");
$result->execute(array('id' => $id));
//$nb_lignes = $stmt2->fetch();

if ($lignes = $result->fetchAll()){
foreach($lignes as $ligne){
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
                <input type="hidden" name="projet_id" id="projet_id" value="<?php echo($ligne['id']); ?>"/>
                    <label class="form-label" for="projet_nom">Nom du projet :</label>
                    <input class="form-control" type="text" name="projet_nom" id="projet_nom"
                        value="<?php echo($ligne['nom_projet']); ?>" />

                    <label class="form-label" for="projet_description">Description du projet</label>
                    <input class="form-control" type="text" name="projet_description" id="projet_description"
                        value="<?php echo($ligne['description_projet']); ?>" />

                    <label class="form-label" for="">Date butoir</label>
                    <input class="form-control" type="text" name="" id=""
                        value="<?php echo($ligne['date_butoir']); ?>" disabled />

                    <label class="form-label" for="email">Objectif :</label>
                    <input class="form-control" type="number" name="email" id="email"
                        value="<?php echo($ligne['objectif']); ?>" disabled />

                    <br>
                    <input class="btn btn-primary" type="submit" value="Modifier" />
                </form>
                <br/>

                <a href="projet_détail.php?nom_projet=<?php echo $ligne['nom_projet']; ?>" title="Envoyer"><input class="btn btn-primary" type="submit" value="Voir son projet" /></a>
                <br>
                <br>

                <form action="confirmation_suppression.php" method="post">
                    <input class="form-control" type="hidden" name="id" id="id"
                        value="<?php echo($ligne['id']); ?>" />
                    <input class="btn btn-danger" type="submit" value="Supprimer le projet" />
                </form>  
            </div>
        </div>
    </div>

    </div>
    <?php
}
}else{ ?>
    <div class="titre shadow-lg p-3 mb-5 bg-white rounded border border-5">
    <h1>Vous n'avez pas de projets</h1>
    <h2>Mais cela ne serait tarder hehe</h2>
    </div>
<?php }   


?>



<?php



