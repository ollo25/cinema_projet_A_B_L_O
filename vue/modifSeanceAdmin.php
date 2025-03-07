
<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Seance.php";
require_once "../src/repository/SeanceRepository.php";
require_once "../src/modele/Film.php";
require_once "../src/repository/FilmRepository.php";
require_once "../src/modele/Salle.php";
require_once "../src/repository/SalleRepository.php";
$idSeance = new FilmRepository();
$listeFilm=$idSeance->recupererFilms();
$idSalle=new SalleRepository();
$listeSalle=$idSalle->recupererSalle();
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
                <?php
                $seanceData = isset($seance[0]) ? $seance[0] : [];
                ?>

                <form action="../src/traitement/modifSeance.php" method="post">
                    <label>Film <br>
                        <select name="filmNvSeance" required>
                            <?php
                            $idSeance = isset($seanceData['idSeance']) ? htmlspecialchars($seanceData['idSeance']) : '';

                            foreach ($listeFilm as $listeFilms): ?>
                                <option value="<?= $listeFilms->getIdFilm() ?>" <?= ($listeFilms->getIdFilm() == $idSeance) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($listeFilms->getTitre()) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                    </label>

                    <label>Date <br>
                        <input type="date" value="<?= isset($seanceData['date']) ? htmlspecialchars($seanceData['date']) : ''; ?>" name="dateNvSeance" class="auto-width">
                    </label>

                    <label>Heure Début <br>
                        <input type="time" value="<?= isset($seanceData['heureDebut']) ? htmlspecialchars($seanceData['heureDebut']) : ''; ?>" name="heureDNvSeance" class="auto-width">
                    </label>

                    <label>Heure Fin <br>
                        <input type="time" value="<?= isset($seanceData['heureFin']) ? htmlspecialchars($seanceData['heureFin']) : ''; ?>" name="heureFNvSeance" class="auto-width">
                    </label>

                    <label>Salle <br>
                        <select name="salleNvSeance" required>
                            <?php
                            $idSalle = isset($seanceData['refSalle']) ? htmlspecialchars($seanceData['refSalle']) : '';

                            foreach ($listeSalle as $listeSalles): ?>
                                <option value="<?= $listeSalles->getIdSalle() ?>" <?= ($listeSalles->getIdSalle() == $idSalle) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($listeSalles->getNumero()) ?> - <?= htmlspecialchars($listeSalles->getNbplaces()) ?> place(s)
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
