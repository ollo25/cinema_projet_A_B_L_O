
<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Seance.php";
require_once "../src/repository/SeanceRepository.php";
require_once "../src/modele/Film.php";
require_once "../src/repository/FilmRepository.php";
require_once "../src/modele/Salle.php";
require_once "../src/repository/SalleRepository.php";
$seance=new SeanceRepository();
$listeSeance=$seance->recupererSeance();
$film = new FilmRepository();
$listeFilm=$film->recupererFilms();
$salle=new SalleRepository();
$listeSalle=$salle->recupererSalle();

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
                <h1>CINEMAX ADMIN - Ajout d'une nouvelle Séance</h1>
                <!-- le htmlspecialchars permet de pouvoir mettre des espaces / charactères speciaux dans les placeholders-->
                <form action="../src/traitement/ajoutSeance.php" method="post">
                    <label>Film <br>
                        <select name="idFilmSaisi" required>
                            <?php
                            foreach ($listeFilm as $listeFilms): ?>
                                <option value="<?=$listeFilms->getIdFilm()?>"><?=$listeFilms->getTitre()?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                    </label>

                    <label>Date <input type="date"  name="dateNvSeance" class="auto-width"></label>
                    <label>Heure Debut <input type="time" name="heureDNvSeance" class="auto-width"></label>
                    <label>Heure Fin <input type="time" name="heureFNvSeance" class="auto-width"></label>
                    <label>Salle <br>
                        <select name="idSalleSaisie" required>
                            <?php
                            foreach ($listeSalle as $listeSalles): ?>
                                <option value="<?=$listeSalles->getIdSalle()?>">Salle n°<?=$listeSalles->getNumero()?> - <?=$listeSalles->getNbPlaces()?> place(s)</option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                    </label>
                    <input type="submit" value="Ajouter">
                </form>
            </div>
        </div>
    </div>
</header>
</body>
</html>
