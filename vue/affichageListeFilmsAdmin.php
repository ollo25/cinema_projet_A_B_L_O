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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="../assets/css/affichageFilmsAdmin.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <table>
            <tr>
                <th>id</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Durée (en min)</th>
                <th>Genre</th>
                <th>Affiche</th>
            </tr>
        <?php foreach ($catalogue as $film) { ?>

                <tr>
                    <td><?=$film->getIdFilm() ?></td>
                    <td><?=$film->getTitre() ?></td>
                    <td><?=$film->getDescription() ?></td>
                    <td><?=$film->getDuree() ?></td>
                    <td><?=$film->getGenre() ?></td>
                    <td><?=$film->getAffiche() ?></td>
                </tr>
            </table>
        <?php } ?>
    </div>
</div>

</body>
</html>


