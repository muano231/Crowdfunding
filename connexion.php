<?php 

include_once("header.php");

?>

<div class="titre shadow-lg p-3 mb-5 bg-white rounded border border-5 ">
    <h1>Connectez-vous : </h1>
    <form action="connexion_process.php" method="post">
        <div>
                <label class="form-label" for="login">Login :</label>
                <input class="form-control" type="text" name="login" id="login" value="" required />
        </div>

        <div>
                <label class="form-label" for="password">Mot de passe :</label>
                <input class="form-control" type="text" name="password" id="password" value="" required />
        </div>
        
        <input class="btn btn-primary" type="submit" value="Connexion" />


    </form>

        <a href="inscription.php">Vous n'avez pas encore de compte ? inscrivez-vous!</a>
    
</div>




























<?php



include_once("footer.php");