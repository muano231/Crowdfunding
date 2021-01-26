<?php
session_start();
include_once('../include/connexionbdd.php');
$nom_projet = $_GET['projet'];

?>
<h1>Votre donation a bien été effectuée !</h1>
<h1>Nous vous remerçions de soutenir le projet : <?php echo $nom_projet ?></h1>
<form action="../front/index.php">
    <input class="btn btn-danger" type="submit" value="Retouner à la pge d'acceuil" />
</form> 
