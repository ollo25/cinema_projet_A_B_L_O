<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Catalogue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
    <link href="pageCatalogue.css" rel="stylesheet" />
</head>
<body>
<?php
$bdd = new PDO("mysql:host=localhost;dbname=lom_gestion_cinema;charset=UTF8", "root", "");
$req=$bdd->prepare("SELECT * FROM film");
$req->execute();
$film = $req->fetchAll();

foreach($film as $films){
    ?>
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="<?php echo $films['affiche']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $films['titre']; ?></h5>
                    <p class="card-text"><?php echo $films['description']; ?></p>
                    <time
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>





</body>
</html>
