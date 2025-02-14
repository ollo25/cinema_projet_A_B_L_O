<?php
require_once "../bdd/Bdd.php";
require_once "../modele/Film.php";
require_once "../repository/FilmRepository.php";
$idFilm = $_POST['idSaisie'];

var_dump($_POST);
if (isset($_POST['button'])){
    session_start();
    if($_POST['button']=='suppr'){
        $film=new film([
                "idFilm"=>$_POST['idSaisie']
            ]
        );
        $filmRepo=new FilmRepository();
        $test = $filmRepo->deleteFilm($film);
        if($test){
            header("Location:../../vue/listeFilms.php?parametre=suppressionReussie");
        }
        else{
            header("Location:../../vue/listeFilm.php?parametre=erreur");
        }
    }
    elseif ($_POST['button']=='modifier'){
        $_SESSION['idFilmSelection']=$idFilm;
        header('Location: ../../vue/modifFilmAdmin.php');
    }
    elseif ($_POST['button']=='nvFilm'){
        $_SESSION['idFilmSelection']=$idFilm;
        header('Location: ../../vue/nouveauFilmAdmin.php');
    }
    else{
        header('Location: ../../vue/listeFilms.php?parametre=erreur');
    }

}

?>
<!DOCTYPE html>
<html lang="fr">