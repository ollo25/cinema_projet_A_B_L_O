
<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Seance.php";
require_once "../src/repository/SeanceRepository.php";
require_once "../src/modele/Film.php";
require_once "../src/repository/FilmRepository.php";
require_once "../src/modele/Salle.php";
require_once "../src/repository/SalleRepository.php";
$film = new FilmRepository();
$listeFilm=$film->recupererFilms();
$salle=new SalleRepository();
$listeSalle=$salle->recupererSalle();
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
                <h1>CINEMAX ADMIN - Modifier une Seance</h1>
                <?php
                $seanceModele=new Seance([
                    'idSeance'=>$_SESSION['idSeanceSelection']
                ]);
                $seanceRepo = new seanceRepository();
                $seance = $seanceRepo->recupererInfoUniqueSeance($seanceModele);
                ?>
                <!-- le htmlspecialchars permet de pouvoir mettre des espaces / charactères speciaux dans les placeholders-->
                <form action="../src/traitement/modifSeance.php" method="post">
                    <label>Film <br>
                        <select name="filmNvSeance" required>
                            <?php
                            $film = htmlspecialchars($seance->getIdFilm());

                            foreach ($listeFilm as $listeFilms): ?>                                      <!--racourci pour if -->
                                <option value="<?=$listeFilms->getIdFilm()?>"<?=$listeFilms->getIdFilm() == $film ? 'selected' : '' ?>>
                                    <?=$listeFilms->getTitre()?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                    </label>
                    <label>Date <input type="date" value="<?php echo htmlspecialchars($seance->getDate()); ?>" name="dateNvSeance" class="auto-width"></label>
                    <label>Heure Début <input type="time" value="<?php echo htmlspecialchars($seance->getHeureDebut()); ?>" name="heureDNvSeance" class="auto-width"></label>
                    <label>Heure Fin <input type="time" value="<?php echo htmlspecialchars($seance->getHeureFin()); ?>" name="heureFNvSeance" class="auto-width"></label>
                    <label>Salle <br>
                        <select name="salleNvSeance" required>
                            <?php
                            $salle = htmlspecialchars($seance->getIdSalle());

                            foreach ($listeSalle as $listeSalles): ?>                                      <!--racourci pour if -->
                                <option value="<?=$listeSalles->getIdSalle()?>"<?=$listeSalles->getIdSalle() == $salle ? 'selected' : '' ?>>
                                    <?=$listeSalles->getNumero()?> - <?=$listeSalles->getNbplaces() ?> place(s)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <br><br>
                    <input type="submit" value="Modifier">
                </form>
            </div>
        </div>
    </div>
</header>
</body>
</html>
