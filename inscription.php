<?php 

include_once("header.php");

?>

<div class="titre shadow-lg p-3 mb-5 bg-white rounded border border-5 ">
    <h1>Formulaire d'inscription : </h1>
    <form action="inscription_process.php" method="post">

        <div class="mb-3">
            <div >
                <label class="form-label"for="nom">Nom :</label>
                <input class="form-control" type="text" name="nom" id="nom" value="" />
            </div>

            <div>
                <label class="form-label" for="prenom">Prenom :</label>
                <input class="form-control" type="text" name="prenom" id="prenom" value="" />
            </div>

            <div>
                <label class="form-label" for="login">Login :</label>
                <input class="form-control" type="text" name="login" id="login" value="" required />
            </div>

            <div>
                <label class="form-label" for="email">Email :</label>
                <input class="form-control" type="email" name="email" id="email" value="" required />
            </div>

            <div>
                <label class="form-label" for="password">Mot de passe :</label>
                <input class="form-control" type="text" name="password" id="password" value="" required />
            </div>

            <input class="btn btn-primary" type="submit" value="Inscription" />
        </div>
    </form>
</div>

<?php 

include_once("footer.php");