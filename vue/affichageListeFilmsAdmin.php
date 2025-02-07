<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Film.php";
require_once "../src/repository/FilmRepository.php";

$filmRepository = new FilmRepository();
/** @var Film[] $catalogue */
$catalogue = $filmRepository->recupererFilms();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Les films</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/affichageFilmsAdmin.css">

</head>
<body>
<style>

</style>

<header class="masthead">
    <div class="text-center"
                <h1>CINEMAX ADMIN - Liste des films</h1>
                <br>
                        <table class="table-custom">
                            <th>id</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Durée (en min)</th>
                            <th>Genre</th>
                            <th>Affiche</th>
                            <tr>
                                <?php foreach ($catalogue as $films): ?>
                                <td><?=$films->getIdFilm() ?></td>
                                <td><?=$films->getTitre() ?></td>
                                <td><?=$films->getDescription() ?></td>
                                <td><?=$films->getDuree() ?></td>
                                <td><?=$films->getGenre() ?></td>
                                <td><?=$films->getAffiche() ?></td>
                            </tr>


                            <?php endforeach; ?>
                        </table>

        </header>



        <?php ; ?>
</body>
</html>


