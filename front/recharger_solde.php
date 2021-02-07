<?php

include_once('../include/header.php');

$id = $_SESSION['id'];

?>

<div class="card mb-3" style="max-width: 1010px;margin-left:150px;margin-top:50px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://source.unsplash.com/random/300x600">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Recharger le solde</h5>
                <form action="../back/recharger_solde_process.php" method="post">
                    <label class="form-label" for="montant">Montant à créditer :</label>
                    <input class="form-control" type="number" name="montant" id="montant" required />
                    <br>
                    <input class="btn btn-primary" type="submit" value="Créditer" />
                </form>
            </div>
        </div>
    </div>
</div>


<?php include_once("../include/footer.php"); ?> 