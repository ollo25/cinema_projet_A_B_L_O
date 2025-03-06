<?php
require_once "../bdd/Bdd.php";
require_once "../modele/Seance.php";
require_once "../repository/SeanceRepository.php";
require_once "../modele/Salle.php";
require_once "../repository/SalleRepository.php";

$salleRepository = new SalleRepository();
var_dump($_POST);
if(!(empty($_POST['idFilmSaisi'])&& empty($_POST['dateNvSeance'])&& empty($_POST['heureDNvSeance'])&& empty($_POST['heureFNvSeance'])&& empty($_POST['salleNvSeance']))) {
    $seance = new Seance([
        'refFilm' => $_POST['idFilmSaisi'],
        'date' => $_POST['dateNvSeance'],
        'heureDebut' => $_POST['heureDNvSeance'],
        'heureFin' => $_POST['heureFNvSeance'],
        'refSalle' => $_POST['idSalleSaisie'],
        'placesDispo' => $salleRepository->recupererNbPlacesLierASalle($_POST['idSalleSaisie']),
    ]);
    var_dump($seance);
    $seanceRepository = new SeanceRepository();
    $ajoutValidation = $seanceRepository->nvSeance($seance);
    if($ajoutValidation) {
        header("Location: ../../vue/listeSeances.php?parametre=ajoutReussi");
    }
    else{
        header("Location: ../../vue/listeSeances.php?parametre=erreur");
    }
}
else {
    header("Location: ../../vue/nouvelleSeanceAdmin.php?parametre=champs");
}

