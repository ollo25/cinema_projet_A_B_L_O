
<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Salle.php";
require_once "../src/repository/SalleRepository.php";
session_start();
if (!isset($_SESSION['connexionAdmin'])) {
    header('location: ../index.php?parametre=fakeAdmin');
} elseif (!$_SESSION['connexionAdmin']) {
    header('location: ../index.php?parametre=fakeAdmin');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CINEMAX</title>

</head>
<body id="page-top">
<?php require_once 'PopUp.php';
if(isset($_GET['parametre'])){
    if($_GET['parametre']=="suprresionReussie"){
        $pop = new PopUp();
        $pop->showPopup("Suppression de l'utilisateur reussie");
    }
    if($_GET['parametre']=="erreur"){
        $pop = new PopUp();
        $pop->showPopup("Erreur");
    }

} ?>
<style>
    .auto-width {
        width: 100%;   /* Prend toute la largeur disponible */
    }
</style>

<!-- Navigation-->
<a href="../index.php">Retour Index</a>
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1>CINEMAX ADMIN - Ajout d'une nouvelle salle</h1>
                <!-- le htmlspecialchars permet de pouvoir mettre des espaces / charactères speciaux dans les placeholders-->
                <form action="../src/traitement/ajoutSalle.php" method="post">
                    <label>Numero <input type="number" name="numeroNvSalle" class="auto-width"></label>
                    <label>Nombre de places <input type="number" name="nbPlacesNvSalle" class="auto-width"></label>
                    <input type="submit" value="Ajouter">
                </form>
            </div>
        </div>
    </div>
</header>
</body>
</html>
