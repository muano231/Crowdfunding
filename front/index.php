<?php 
include_once("../include/connexionbdd.php");
include_once("../include/header.php");
$affichage = $_GET['affichage'];

//Affichage des projets en fonction de l'objectif du projet
switch ($affichage){
    case "depasse" :
        $req = "SELECT * FROM projet WHERE AND date_butoir < NOW() utilisateur_id != $_SESSION[id] ORDER BY date_butoir DESC";
        $req2 = "SELECT * FROM projet WHERE date_butoir < NOW() ORDER BY date_butoir DESC";
        break;
    case "termine" :
        $req = "SELECT * FROM projet WHERE utilisateur_id != $_SESSION[id] ORDER BY date_butoir DESC";
        $req2 = "SELECT * FROM projet WHERE  ORDER BY date_butoir DESC";
        break;
    default :
        $req = "SELECT * FROM projet WHERE utilisateur_id != $_SESSION[id] ORDER BY date_butoir DESC";
        $req2 = "SELECT * FROM projet ORDER BY date_butoir DESC";
        break;
}

?>

<div class="titre shadow-lg p-3 mb-5 bg-white rounded border border-5">
    <h1>Bienvenue sur le meilleur site de crowdfunding de la terre</h1>
    <h2>Voici tout les projets en cours </h2>

    <div class="d-flex text-center" style="padding-left: 40px;" >
        <form action=""></form>
        <input class="btn btn-primary border" type="button" name="tout" id="" value="Tout les projets">
        <form action=""></form>
        <input class="btn btn-primary border" type="button" name="termine" id="" value="Les projets terminés">
        <form action=""></form>
        <input class="btn btn-primary border" type="button" name="depasse" id="" value="Les projets dépassés">
    </div>
    <br>


    <?php 
        if(isset($_SESSION['id']) AND isset($_SESSION['login'])){
            $result = $pdo->prepare($req); 
            $result->execute(array());
        }else{
            ?>
    <a class="btn btn-primary" href="connexion.php">Se connecter</a>
    
    <?php
    $result = $pdo->prepare($req2); 
    $result->execute(array());
        }    
            ?>

    <?php 


//Affichage des projets
while($lignes = $result->fetch()){
    $nom_projet = $lignes['nom_projet'];
    ?>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://source.unsplash.com/random/300x200" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?php echo $nom_projet; ?></h5>
            <p class="card-text"><?php echo($lignes['description_projet']); ?></p>

            <a href="projet_détail.php?nom_projet=<?php echo $nom_projet; ?>" title="Envoyer"><input class="btn btn-primary" type="submit" value="Plus de détails" /></a>
        </div>
    </div>
    <?php
}

echo "</div>";

include_once("../include/footer.php");