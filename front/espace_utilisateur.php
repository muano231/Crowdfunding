<?php

include_once('../include/header.php');
include_once('../include/connexionbdd.php');

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
                <form action="../back/espace_utilisateur_update.php" method="post">
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
                    <br>
                    <input class="btn btn-primary" type="submit" value="Mettre à jour mes informations" />
                </form>
            </div>
            <div class="card-body">
                <h5 class="card-title">Modifier mon mot de passe</h5>
                <form action="../back/espace_utilisateur_update_password.php" method="post">
                    <label class="form-label" for="old_password">Mot de passe actuel :</label>
                    <input class="form-control" type="password" name="old_password" id="old_password" required />

                    <label class="form-label" for="new_password">Nouveau mot de passe :</label>
                    <input class="form-control" type="password" name="new_password" id="new_password" required />

                    <label class="form-label" for="new_password_conf">Confirmation du mot de passe :</label>
                    <input class="form-control" type="password" name="new_password_conf" id="new_password_conf" required />
                    <br>
                    <input class="btn btn-primary" type="submit" value="Mettre à jour mon mot de passe" />
                </form>
            </div>
        </div>
    </div>
</div>