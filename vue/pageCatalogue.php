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
    <title>Catalogue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="../assets/pageCatalogue.css" rel="stylesheet" />
</head>
<body>
<div class="row">
    <?php foreach($catalogue as $film){ ?>
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="<?=$film->getAffiche() ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?=$film->getTitre() ?></h5>
                    <p class="card-text"><?=$film->getDescription() ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                </ul>
            </div>
        </div>
    <?php } ?>
</div>


</body>
</html>
