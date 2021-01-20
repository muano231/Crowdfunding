<?php

include_once('header.php');
include_once('connexionbdd.php');

$id = $_SESSION['id'];

//Récupération des infos de l'utilisateur
$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id = :id");
$stmt->execute(array(
    'id' => $id));

$resultat = $stmt->fetch();




?>
<div class="card mb-3" style="max-width: 1010px;margin-left:150px;margin-top:50px;">

    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://source.unsplash.com/random/300x600">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Modifier mes informations</h5>
                <form action="espace_utilisateur_update.php" method="post">
                    <label class="form-label" for="nom">Nom :</label>
                    <input class="form-control" type="text" name="nom" id="nom"
                        value="<?php echo($resultat['nom']); ?>" />

                    <label class="form-label" for="prenom">Prenom</label>
                    <input class="form-control" type="text" name="prenom" id="prenom"
                        value="<?php echo($resultat['prenom']); ?>" />

                    <label class="form-label" for="login">Login</label>
                    <input class="form-control" type="text" name="login" id="login"
                        value="<?php echo($resultat['login']); ?>" required />

                    <label class="form-label" for="email">Email :</label>
                    <input class="form-control" type="email" name="email" id="email"
                        value="<?php echo($resultat['email']); ?>" required />

                    <label class="form-label" for="password">Mot de passe :</label>
                    <input class="form-control" type="text" name="password" id="password"
                        value="<?php echo($resultat['mot_de_passe']); ?>" required />
                    <br>
                    <input class="btn btn-primary" type="submit" value="Modifier" />
                </form>

            </div>
        </div>
    </div>

</div>

<?php 

$result = $pdo->prepare("SELECT * FROM projet WHERE utilisateur_id = :id AND DATEDIFF( date_butoir, DATE( NOW() ) )>0 ORDER BY date_butoir ASC");
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
                <form action="espace_utilisateur_update_projet.php" method="post">
                <input type="hidden" name="projet_id" id="projet_id" value="<?php echo($lignes['id']); ?>"/>
                    <label class="form-label" for="projet_nom">Nom du projet :</label>
                    <input class="form-control" type="text" name="projet_nom" id="projet_nom"
                        value="<?php echo($lignes['nom_projet']); ?>" />

                    <label class="form-label" for="projet_description">Description du projet</label>
                    <input class="form-control" type="text" name="projet_description" id="projet_description"
                        value="<?php echo($lignes['description_projet']); ?>" />

                    <label class="form-label" for="">Date butoire</label>
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
                    <input class="form-control" type="hidden" name="utilisateur_id" id="utilisateur_id"
                        value="<?php echo($resultat['id']); ?>" />
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



