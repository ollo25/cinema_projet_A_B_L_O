<?php
require_once "../bdd/Bdd.php";
require_once "../modele/Salle.php";
require_once "../repository/SalleRepository.php";
if(!(empty($_POST['numeroNvSalle'])&& empty($_POST['nbPlacesNvSalle']))) {
    $salle = new Salle([
        'numero' => $_POST['numeroNvSalle'],
        'nbPlaces' => $_POST['nbPlacesNvSalle'],
    ]);
    $salleRepository = new SalleRepository();
    $ajoutValidation = $salleRepository->nvSalle($salle);

    if($ajoutValidation) {
        header("Location: ../../vue/listeSalles.php?parametre=ajoutReussi");
    }
    else{
        header("Location: ../../vue/listeSalles.php?parametre=erreur");
    }

}
else {
    header("Location: ../../vue/nouvelleSalleAdmin.php?parametre=champs");
}

