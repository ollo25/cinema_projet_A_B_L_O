<?php
require_once "../modele/Film.php";
require_once "../repository/Filmrepository.php";

if (
    !(isset($_POST["titre"]) &&
        isset($_POST["description"]) &&
        isset($_POST["duree"]) &&
        isset($_POST["genre"]) &&
        isset($_POST["affiche"]))) {

        }
    if(!( empty($_POST["titre"]))) {
        $user = new User([
            "titre" => $_POST["titre"],
            "description" => $_POST["description"],
            "duree" => $_POST["duree"],
            "genre" => $_POST["genre"],
            "affiche" => $_POST["affiche"]
        }
]);
$FilmRepository = new FilmRepository();
$film = $FilmRepository->film($film);