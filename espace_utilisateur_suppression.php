<?php 
session_start();
include_once('connexionbdd.php');
?>

<a>Vous êtes sur le point de supprimer le Projet <?php $_POST['projet_nom']?>,</a>
<a>pour en confirmer la suppression veuillez taper le nom du projet ci-dessous</a>