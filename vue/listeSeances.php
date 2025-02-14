<!DOCTYPE html>
<html lang="en">


<body>

<?php
session_start();
if (!isset($_SESSION['connexionAdmin'])) {
    header('location: ../index.php?parametre=fakeAdmin');
} elseif (!$_SESSION['connexionAdmin']) {
    header('location: ../index.php?parametre=fakeAdmin');
}

require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Seance.php";
require_once "../src/repository/SeanceRepository.php";


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
    if($_GET['parametre']=="erreur"){
        $pop = new PopUp();
        $pop->showPopup("Erreur");
    }
}

$seance=new SeanceRepository();
$listeSeance=$seance->recupererSeance();
?>
PAGE NON FONCTIONNELLE POUR L'INSTANT
AF
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1>CINEMAX ADMIN - Liste des Séances</h1>
                <br>
                <table border="2">
                    <tr>
                        <td>ID - Séance</td>
                        <td>Film</td>
                        <td>Salle</td>
                        <td>Date</td>
                        <td>Heure</td>
                        <td>Places disponibles</td>
                    </tr>

                    <?php
                    /** @var $listeSeance $ */
                    foreach ($listeSeance as $listeSeances): ?>
                        <tr>
                            <td><?= ($listeSeance->getIdSeance()) ?></td>
                            <td><?= ($listeSeance->getIdFilm()) ?></td>
                            <td><?= ($listeSeance->getSalle()) ?></td>
                            <td><?= ($listeSeance->getDate()) ?></td>
                            <td><?= ($listeSeance->getHeure()) ?></td>
                            <td><?= ($listeSeance->getPlaceDispo()) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <h2> Inserer l'ID de la séance a modifier / supprimer : </h2>

                <form action="../src/traitement/gestionFilm.php" method="post">
                    <label >Films :</label>
                    <select name="idSaisie" required>
                        <?php
                        /** @var User $user */
                        foreach ($listeSeance as $listeSeances): ?>
                            <option value="<?=$listeSeances->getIdSeance()?>"><?=$listeSeances->getIdSeance()?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button name="button" value="suppr" class="btn btn-primary" style="margin-top: 10px;" type="submit">Supprimer</button>
                    <button name="button" value="modifier" class="btn btn-primary" style="margin-top: 10px;" type="submit">Modifier la seance</button>
                </form>
                <a href="nouvelleSeanceAdmin.php" class="button">Nouvelle Seance</a>
            </div>
        </div>
    </div>
</header>
</body>
</html>