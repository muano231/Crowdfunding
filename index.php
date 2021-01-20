<?php 

include_once("header.php");
include_once("connexionbdd.php");

?>

<div class="titre shadow-lg p-3 mb-5 bg-white rounded border border-5">
    <h1>Bienvenue sur le meilleur site de crowdfunding de la terre</h1>
    <h2>Voici tout les projets en cours </h2>

    <?php 
        if(isset($_SESSION['id']) AND isset($_SESSION['login'])){
        }else{
            ?>
    <a class="btn btn-primary" href="connexion.php">Se connecter</a>
    <?php
        }    
            ?>

    <?php 

$result = $pdo->prepare("SELECT * FROM projet WHERE DATEDIFF( date_butoir, DATE( NOW() ) )>0 ORDER BY date_butoir ASC");
$result->execute(array());
//$nb_lignes = $stmt2->fetch();

while($lignes = $result->fetch()){
    ?>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://source.unsplash.com/random/300x200" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?php echo($lignes['nom_projet']); ?></h5>
            <p class="card-text"><?php echo($lignes['description_projet']); ?></p>

            <form action="projet_détail.php" method="post">
                <input type="hidden" name="projet_id" id="projet_id" value="<?php echo($lignes['id']); ?>" />
                <input class="btn btn-primary" type="submit" value="Plus de détails" />
            </form>
        </div>
    </div>

    <?php
}


?>








</div>

<?php 

include_once("footer.php");