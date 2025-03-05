
<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Film.php";
require_once "../src/repository/FilmRepository.php";
session_start();
if (!$_SESSION['connexionAdmin']) {
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
                <h1>CINEMAX ADMIN - Ajout d'un nouveau film</h1>
                <!-- le htmlspecialchars permet de pouvoir mettre des espaces / charactères speciaux dans les placeholders-->
                <form action="../src/traitement/ajoutFilm.php" method="post">
                    <label>Titre <input type="text"  name="titreNvFilm" class="auto-width"></label>
                    <label>Description <input type="text" name="descriptionNvFilm" class="auto-width"></label>
                    <label>Genre <input type="text"  name="genreNvFilm" class="auto-width"></label>
                    <label>Duree <input type="time"  name="dureeNvFilm" class="auto-width"></label>
                    <label>Affiche <input type="text" name="afficheNvFilm" class="auto-width"></label>
                    <input type="submit" value="Ajouter">
                </form>
            </div>
        </div>
    </div>
</header>
</body>
</html>
