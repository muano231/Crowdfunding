<?php 
session_start();
include_once('connexionbdd.php');
$nom = $_GET['nom_projet'];
?>

<a>Vous êtes sur le point de supprimer le Projet </a>
<a style="color: red"><?php echo $nom ?></a>
<a>, pour en confirmer la suppression veuillez taper le nom du projet ci-dessous :</a>
</br>
<label>Nom du projet :</label>
<input></input>
<a href="suppression.php?validation_supression=<?php echo $lignes['nom_projet'] ?>" title="test">Supprimer</a>
<a href="espace_utilisateur.php" title="test">Annuler</a>
<?php

?>