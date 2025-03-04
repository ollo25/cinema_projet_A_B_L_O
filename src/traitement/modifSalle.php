<?php
require_once "../bdd/Bdd.php";
require_once "../modele/Salle.php";
require_once "../repository/SalleRepository.php";
session_start();
$salle = new Salle([
    "idSalle" => $_SESSION["idSalleSelection"],
    "numero"=> $_POST['numeroNvSalle'],
    "nbPlaces" => $_POST["nbPlacesNvSalle"],
]);
$salleRepository = new SalleRepository();
$salleResultat = $salleRepository->updateSalle($salle);

if ($salleResultat) {
    header("Location: ../../vue/listeSalles.php?parametre=update");
}
else{
    header("Location: ../../vue/listeSalles.php?parametre=erreur");
}