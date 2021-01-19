<?php 

session_start();

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>YannFunding</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">YannFunding</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>

                    <?php 
                    
                    if(isset($_SESSION['id']) AND isset($_SESSION['login'])){
                        ?> 
                        <li class="nav-item">
                        <a class="nav-link" href="espace_utilisateur.php">Mon Espace</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="deconnexion.php">Se déconnecter</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="projet_creation.php">Créer un projet</a>
                        </li>

                        

                        <?php 
                    }else{
                        ?>
                        <li class="nav-item">
                        <a class="nav-link" href="inscription.php">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>

                    <?php 
                    
                    };
                    ?>


                    





                </ul>
            </div>
        </div>
    </nav>