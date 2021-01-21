<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
                    
                    if(isset($_SESSION['id']) AND isset($_SESSION['login'])){
                        ?> 
                        <li class="nav-item">
                            <a class="nav-link" href="../front/espace_utilisateur.php">Mon Espace</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../front/projet_creation.php">Créer un projet</a>
                        </li>
                        <?php
                        include_once('connexionbdd.php');
                        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE id = :id");
                        $stmt->execute(array(
                            'id' => $_SESSION['id']));

                        $resultat = $stmt->fetch();
                        ?>
                        <li class="nav-item">
                            <a class="nav-link">Mon Solde : <?php echo $resultat['solde'] ?>€</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../back/deconnexion.php">Se déconnecter</a>
                        </li>

                        <?php 
                    }else{
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