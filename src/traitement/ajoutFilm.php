<?php
require_once "../bdd/Bdd.php";
require_once "../modele/Film.php";
require_once "../repository/FilmRepository.php";
if(!(empty($_POST['titreNvFilm'])&& empty($_POST['descriptionNvFilm'])&& empty($_POST['genreNvFilm'])&& empty($_POST['dureeNvFilm'])&& empty($_POST['afficheNvFilm']))) {
    $film = new Film([
        'titre' => $_POST['titreNvFilm'],
        'description' => $_POST['descriptionNvFilm'],
        'genre' => $_POST['genreNvFilm'],
        'duree' => $_POST['dureeNvFilm'],
        'affiche' => $_POST['afficheNvFilm'],
    ]);
    $filmRepository = new FilmRepository();
    $ajoutValidation = $filmRepository->nvFilm($film);
    if($ajoutValidation) {
        header("Location: ../../vue/listeFilms.php?parametre=ajoutReussi");
    }
    else{
        header("Location: ../../vue/listeFilms.php?parametre=erreur");
    }
}
else {
    header("Location: ../../vue/nouveauFilmAdmin.php?parametre=champs");
}

