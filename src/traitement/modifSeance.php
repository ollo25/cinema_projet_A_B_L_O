<?php
require_once "../bdd/Bdd.php";
require_once "../modele/Seance.php";
require_once "../repository/SeanceRepository.php";
session_start();
$seance = new Seance([
    "idSeance" => $_SESSION["idSeanceSelection"],
    "idFilm"=> $_POST['filmNvSeance'],
    "date" => $_POST["dateNvSeance"],
    "heureDebut" => $_POST["heureDNvSeance"],
    "heureFin" => $_POST["heureFNvSeance"],
    "idSalle" => $_POST["salleNvSeance"],
]);
$seanceRepository = new SeanceRepository();
$seanceResultat = $seanceRepository->updateSeance($seance);

if ($seanceResultat) {
    header("Location: ../../vue/listeSeances.php?parametre=update");
}
else{
    header("Location: ../../vue/listeSeances.php?parametre=erreur");
}