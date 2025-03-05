<!DOCTYPE html>
<html lang="en">


<body>

<?php
session_start();
if (!$_SESSION['connexionAdmin']) {
    header('location: ../index.php?parametre=fakeAdmin');
}

require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Salle.php";
require_once "../src/repository/SalleRepository.php";

require_once 'PopUp.php';
if(isset($_GET['parametre'])){
    if($_GET['parametre']=="update"){
        $pop = new PopUp();
        $pop->showPopup("L'update a bien été faite");
    }
    if($_GET['parametre']=="ajoutReussi"){
        $pop = new PopUp();
        $pop->showPopup("L'ajout a bien été fait");
    }
    if($_GET['parametre']=="suppression"){
        $pop = new PopUp();
        $pop->showPopup("Suppression reussie");
    }
    if($_GET['parametre']=="erreur"){
        $pop = new PopUp();
        $pop->showPopup("Erreur");
    }
}

$salle=new SalleRepository();
$listeSalle=$salle->recupererSalle();
?>
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1>CINEMAX ADMIN - Liste des Salles</h1>
                <br>
                <table border="2">
                    <tr>
                        <td>ID Salle</td>
                        <td>Nombre de place(s)</td>
                        <td>Numero</td>
                    </tr>

                    <?php
                    foreach ($listeSalle as $listeSalles): ?>
                        <tr>
                            <td><?= ($listeSalles->getIdSalle()) ?></td>
                            <td><?= ($listeSalles->getNbPlaces()) ?></td>
                            <td><?= ($listeSalles->getNumero()) ?></td>

                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <h2> Inserer l'ID de la salle a modifier / supprimer : </h2>

                <form action="../src/traitement/gestionSalle.php" method="post">
                    <label >Salle :</label>
                    <select name="idSalleSelection" required>
                        <?php
                        foreach ($listeSalle as $listeSalles): ?>
                            <option value="<?=$listeSalles->getIdSalle()?>"><?=$listeSalles->getIdSalle()?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button name="button" value="suppr" class="btn btn-primary" style="margin-top: 10px;" type="submit">Supprimer</button>
                    <button name="button" value="modifier" class="btn btn-primary" style="margin-top: 10px;" type="submit">Modifier la salle</button>
                </form>
                <a href="nouvelleSalleAdmin.php" class="button">Nouvelle Salle</a>
            </div>
        </div>
    </div>
</header>
</body>
</html>
