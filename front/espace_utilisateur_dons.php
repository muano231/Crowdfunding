<?php
//Ajout du header et de la connexion à la bdd
include_once('../include/header.php');
include_once('../include/connexionbdd.php');

//Récupération des infos de l'utilisateur
$utilisateur_id = $_SESSION['id'];

$req = $pdo->prepare("SELECT d.date_don as date_don, u.login as login, p.nom_projet as nom_projet, d.montant as montant
        FROM don d
        JOIN projet p ON d.projet_id = p.id
        JOIN utilisateur u ON d.utilisateur_id = u.id
        WHERE d.utilisateur_id = :utilisateur_id
        ORDER BY date_don ASC");
$req->execute(array(
    'utilisateur_id' => $utilisateur_id));
?>

<!-- Affichage des dons -->
<div class="card mb-3" style="max-width: 70%;margin-left:15%;margin-top:50px;">
    <div style="text-align: center; font-size: 250%; margin: 3%">
        <a>LISTE DES DONS</a>
    </div>
    <div class="row g-0">
        <div>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Date et Heure du Don</th>
                <th scope="col">Donateur</th>
                <th scope="col">Projet</th>
                <th scope="col">Montant</th>
                <th scope="col">Liens des projets</th>
                </tr>
            </thead>
            <tbody>
            <?php
            //Liste tous les dons dans un tableau
            while($ligne_don = $req->fetch()){
                echo "<tr>";
                echo "<td>" . $ligne_don['date_don'] . "</td>";
                echo "<td>" . $ligne_don['login'] . "</td>";
                echo "<td>" . $ligne_don['nom_projet'] . "</td>";
                echo "<td>" . $ligne_don['montant'] . " € </td>";
                echo "<td><a href='../front/projet_détail.php?nom_projet=" . $ligne_don['nom_projet'] . "'>Accéder au projet</a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</div>