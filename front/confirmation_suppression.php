<?php 
session_start();
include_once('../include/connexionbdd.php');
$projet_id = $_POST['id'];
$utilisateur_id = $_POST['utilisateur_id'];

?>
<form action="../back/suppression.php" method="post">
    <input class="form-control" type="hidden" name="id" id="id"
        value="<?php echo $projet_id; ?>" />
    <input class="form-control" type="hidden" name="utilisateur_id" id="utilisateur_id"
        value="<?php echo $utilisateur_id; ?>" />
    <input class="btn btn-danger" type="submit" value="Confirmer la supression" />
</form> 
<form action="../front/espace_utilisateur.php">
    <input class="btn btn-danger" type="submit" value="ne pas supprimer" />
</form> 
