<?php 
//Début de la sessions
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="../img/favicon-16x16.png"/>
    <title>YannFunding</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../front/index.php">YannFunding</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../front/index.php">Accueil</a>
                    </li>

                    <?php 
                    //Vérification de la session
                    if(isset($_SESSION['id']) AND isset($_SESSION['login'])){
                        //Header seulement visible lorsque l'on est connecté
                        ?> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mon Espace</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="../front/espace_utilisateur.php">Utilisateur</a></li>
                                <li><a class="dropdown-item" href="../front/espace_utilisateur_projets.php">Mes Projets</a></li>
                                <li><a class="dropdown-item" href="../front/espace_utilisateur_dons.php">Mes Dons</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../front/projet_creation.php">Créer Un Projet</a>
                        </li>

                        <?php
                        //Récupération du solde
                        include_once('connexionbdd.php');
                        $req = $pdo->prepare("SELECT solde FROM utilisateur WHERE id = :id");
                        $req->execute(array(
                            'id' => $_SESSION['id']));
                        $solde = $req->fetch();
                        ?>

                        <li class="nav-item">
                            <a class="nav-link">Mon Solde : <?php echo $solde['solde'] ?>€</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../back/deconnexion.php">Se Déconnecter</a>
                        </li>

                        <?php 
                    }else{
                        //Header visible lorsque l'on est pas connecté
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../front/inscription.php">Inscription</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../front/connexion.php">Connexion</a>
                        </li>
                        <?php 
                    
                    };
                    ?>
                </ul>
            </div>
        </div>
    </nav>