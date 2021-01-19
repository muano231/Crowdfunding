<?php

include_once('header.php');

?>
<div class="card mb-3" style="max-width: 1100px;margin-left:150px;margin-top:50px;">

    <div class="row g-0">
        <div class="col-md-12">
            <img src="https://source.unsplash.com/random/1100x300">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Lancez vous ! Créer votre propre projet !</h5>
                <form action="projet_creation_process.php" method="post">


                    <label class="form-label" for="projet_nom">Nom du projet</label>
                    <input class="form-control" type="text" name="projet_nom" id="projet_nom" value="" required />
                        

                    <label class="form-label" for="projet_description">Description du projet </label>
                    <textarea class="form-control" name="projet_description" id="projet_description" required></textarea> 

                    

                    <label class="form-label" for="projet_date_butoire">Date butoire :</label>
                    <input class="form-control" type="date" name="projet_date_butoire" id="projet_date_butoire"value="" required />

                    <label class="form-label" for="projet_objectif">Objectif en € :</label>
                    <input class="form-control" type="number" name="projet_objectif" id="projet_objectif "value="" required />
                        
                    <br>
                    <input class="btn btn-primary" type="submit" value="Créer !" />
                </form>

            </div>
        </div>
    </div>

</div>