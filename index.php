<?php 

include_once("header.php");

?>

    <div class="titre shadow-lg p-3 mb-5 bg-white rounded border border-5">
        <h1>Bienvenu sur YannFunding</h1>
        <h2>Voici tout les projets en cours </h2>

        <?php 
        if(isset($_SESSION['id']) AND isset($_SESSION['login'])){
            ?>
            




            <?php


        }else{
            ?>
             <a class="btn btn-primary" href="connexion.php">Se connecter</a>
             <?php
        }    
            ?>
    </div>

<?php 

include_once("footer.php");
