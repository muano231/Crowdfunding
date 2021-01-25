<?php
switch($element_affichage){
    case "lister_projets" :
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
    break;

    case "detail_projet":
        ?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://source.unsplash.com/random/300x200" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $lignes['nom_projet']; ?></h5>
                <p class="card-text"><?php echo $lignes['description_projet']; ?></p>
                <p class="card-text"> DATE BUTOIR : <?php echo $lignes['date_butoir']; ?></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" 
                        aria-valuemax="<?php echo $lignes['objectif']; ?>" style="width: 75%"></div>
                </div>
                <br>
                <a href="../front/projet_détail.php?<?php echo $lignes['objectif']; ?>" class="btn btn-primary">Faire Un Don</a>
            </div>
        </div> 
        <?php
        break;
}

<?php
switch($element_affichage){
    case "detail_projet":
        ?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://source.unsplash.com/random/300x200" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $lignes['nom_projet']; ?></h5>
                <p class="card-text"><?php echo $lignes['description_projet']; ?></p>
                <p class="card-text"> DATE BUTOIR : <?php echo $lignes['date_butoir']; ?></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" 
                        aria-valuemax="<?php echo $lignes['objectif']; ?>" style="width: 75%"></div>
                </div>
                <br>
                <a href="../front/espace_don.php?projet=<?php echo $lignes['id']; ?>" class="btn btn-primary">Faire Un Don</a>
            </div>
        </div> 
        <?php
        break;
}
