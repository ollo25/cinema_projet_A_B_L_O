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
require_once "../src/modele/Reservation.php";
require_once "../src/repository/ReservationRepository.php";


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

$reservation=new ReservationRepository();
$listeReservation=$reservation->recupererReservations();
?>

<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1>CINEMAX ADMIN - Liste des Reservations</h1>
                <br>
                <table border="2">
                    <tr>
                        <td>Id Reservation</td>
                        <td>Id User</td>
                        <td>Id Seance</td>
                        </tr>

                    <?php
                    foreach ($listeReservation as $listeReservations): ?>
                        <tr>
                            <td><?=$listeReservations->getIdReservation()?></td>
                            <td><?=$listeReservations->getIdUser()?></td>
                            <td><?=$listeReservations->getIdSeance()?></td>

                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <h2> Inserer l'ID de le la reservation a modifier / supprimer : </h2>

                <form action="../src/traitement/gestionFilm.php" method="post">
                    <label >Reservation :</label>
                    <select name="idSaisie" required>
                        <?php
                        foreach ($listeReservation as $listeReservations): ?>
                            <option value="<?= ($listeReservations['idReservation']) ?>"><?= ($listeReservations['idReservation']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button name="button" value="nvFilm" class="btn btn-primary" style="margin-top: 10px;" type="submit">Enregistrer un nouveau film</button>
                    <button name="button" value="suppr" class="btn btn-primary" style="margin-top: 10px;" type="submit">Supprimer</button>
                    <button name="button" value="modifier" class="btn btn-primary" style="margin-top: 10px;" type="submit">Modifier le film</button>

                </form>
            </div>
        </div>
    </div>
</header>
</body>
</html>