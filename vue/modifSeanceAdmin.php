
<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Film.php";
require_once "../src/repository/FilmRepository.php";
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
    if($_GET['parametre']=="modificationReussie"){
        $pop = new PopUp();
        $pop->showPopup("Modification du rôle réussie");
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
                <h1>CINEMAX ADMIN - Modifier un film</h1>
                <?php
                $filmModele=new Film([
                    'idFilm'=>$_SESSION['idFilmSelection']
                ]);
                $filmRepo = new filmRepository();
                $film = $filmRepo->recupererInfoUniqueFilm($filmModele);

                ?>
                <!-- le htmlspecialchars permet de pouvoir mettre des espaces / charactères speciaux dans les placeholders-->
                <form action="../src/traitement/modifFilm.php" method="post">
                    <label>Titre <input type="text" value="<?php echo htmlspecialchars($film->getTitre()); ?>" name="titreNvFilm" class="auto-width"></label>
                    <label>Description <input type="text" value="<?php echo htmlspecialchars($film->getDescription()); ?>" name="descriptionNvFilm" class="auto-width"></label>
                    <label>Genre <input type="text" value="<?php echo htmlspecialchars($film->getGenre()); ?>" name="genreNvFilm" class="auto-width"></label>
                    <label>Duree <input type="text" value="<?php echo htmlspecialchars($film->getDuree()); ?>" name="dureeNvFilm" class="auto-width"></label>
                    <label>Affiche <input type="text" value="<?php echo htmlspecialchars($film->getAffiche()); ?>" name="afficheNvFilm" class="auto-width"></label>
                    <input type="submit" value="Modifier">
                </form>
            </div>
        </div>
    </div>
</header>
</body>
</html>
