<!DOCTYPE html>
<html lang="en">
<body>
<a class="navbar-brand" href="indexADMIN.php"> index Admin </a>
<?php
session_start();
if (!$_SESSION['connexionAdmin']) {
    header('location: ../index.php?parametre=fakeAdmin');
}

require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Contact.php";
require_once "../src/repository/ContactRepository.php";


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

$contact=new ContactRepository();
$listeContact=$contact->recupererContacts();
?>

<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1>CINEMAX ADMIN - Liste des Films</h1>
                <br>
                <table border="2">
                    <tr>
                        <td>ID</td>
                        <td>Email de l'envoyeur</td>
                        <td>Objet</td>
                        <td>Description</td>
                        <td>Date</td>
                    </tr>

                    <?php
                    foreach ($listeContact as $listeContacts): ?>
                        <tr>
                            <td><?= ($listeContacts->getIdContact()) ?></td>
                            <td><?= ($listeContacts->getEmail()) ?></td>
                            <td><?= ($listeContacts->getObjet()) ?></td>
                            <td><?= ($listeContacts->getDescription()) ?></td>
                            <td><?= ($listeContacts->getDate()) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <h2> Inserer l'ID de l'utilisateur a modifier / supprimer : </h2>

                <form action="../src/traitement/gestionContact.php" method="post">
                    <label >Films :</label>
                    <select name="idSaisieContact" required>
                        <?php
                        foreach ($listeContact as $contact): ?>
                            <option value="<?=$contact->getIdContact()?>"><?=$contact->getIdContact()?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button name="button" value="suppr" class="btn btn-primary" style="margin-top: 10px;" type="submit">Supprimer</button>
                </form>

            </div>
        </div>
    </div>
</header>
</body>
</html>