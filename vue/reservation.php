<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Film.php";
require_once "../src/repository/FilmRepository.php";
require_once "../src/repository/SeanceRepository.php";
$filmRepository = new FilmRepository();
/** @var Film[] $catalogue */
$reservation = $filmRepository->recupererFilms();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Réservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="../assets/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
<?php foreach($reservation as $film){ ?>
<h1 style="font-family: 'Playfair Display', serif; "><strong><u>Réservation</u></strong></h1>

<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?=$film->getAffiche() ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><strong><u><?=$film->getTitre() ?></u></strong></h5>
                <br>
                <p class="card-text"><em><?=$film->getDescription() ?></em></p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
        </div>

<!-- Button trigger modal -->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Réserver
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation de réservation <i class="bi bi-film"></i></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  ">
               <u style="font-family: 'Bauhaus 93'">Choisir une séance pour regarder le film <?=$film->getTitre() ?></u>:
                <span class="badge text-bg-dark" id="date">Jour</span>
                <BR>
                <button type="button" class="btn btn-light">13H00-14h00</button> <button type="button" class="btn btn-light">15h00-16h00</button>
                <br>
                <br>
                <button type="button" class="btn btn-light">16h00-17h00</button> <button type="button" class="btn btn-light">17h00-18h00</button>
                <br>
                <br>
                <button type="button" class="btn btn-light">19h00-20h00</button> <button type="button" class="btn btn-light">20h00-21h00</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Changer de film</button>
                <button type="button" class="btn btn-primary">Réserver</button>

            </div>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
    </div>
</div>
