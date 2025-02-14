<?php
require_once "../bdd/Bdd.php";
require_once "../modele/Film.php";
require_once "../repository/FilmRepository.php";
session_start();
$film = new Film([
    "idFilm"=> $_SESSION['idFilmSelection'],
    "titre" => $_POST["titreNvFilm"],
    "description" => $_POST["descriptionNvFilm"],
    "genre" => $_POST["genreNvFilm"],
    "duree" => $_POST["dureeNvFilm"],
    "affiche" => $_POST["afficheNvFilm"]
]);
$filmRepository = new FilmRepository();
$filmResultat = $filmRepository->updateFilm($film);
if ($filmResultat) {
    header("Location: ../../vue/listeFilms.php?parametre=update");
}
else{
    header("Location: ../../vue/listeFilms.php?parametre=erreur");
}