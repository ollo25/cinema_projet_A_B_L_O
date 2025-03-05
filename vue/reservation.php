<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Seance.php";
require_once "../src/repository/SeanceRepository.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CINEMAX</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/css/reservation.css" rel="stylesheet" />
</head>
<body id="page-top">
<?php
require_once '../vue/PopUp.php';
if(isset($_GET['parametre'])){
    if($_GET['parametre']=="inscrit"){
        $pop = new PopUp();
        $pop->showPopup("Vous êtes inscrit");
    }
    elseif($_GET['parametre']==2){
        $pop = new PopUp();
        $pop->showPopup("Erreur");
    }
    elseif($_GET['parametre']=="fakeAdmin"){
        $pop = new PopUp();
        $pop->showPopup("TU AS ESSAYE DE M'AVOIR AVEC TON LIEN");
    }
}

?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">


            <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </div>
        </div>
</nav>


                   <nav class="navbar" style="background-color: #e3f2fd;">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Retour</a></li>


                </ul>



</nav>

<!-- Masthead-->
<header class="masthead">

    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center" style="padding-top: 80px;"> <!-- Ajustement du titre -->
        <div class="reservation container">
            <br>

            <div class="h4 pb-2 mb-4 text-danger border-bottom border-black text-center">
               <strong><font color="black">Réserver</font></strong>
            </div>

            <?php
            $seanceRepo = new SeanceRepository();
            $seanceLierAuFilm = $seanceRepo->recupererSeanceLierASFilm($_GET['id_film']);

            foreach ($seanceLierAuFilm as $seance) { ?>
                <form method="post" action="../src/traitement/gestionReservation.php">
                    <button type="submit" name="reserver" value="<?= $seance->getIdSeance() ?>">
                        <?=$seance->getDate()?>
                        <br>
                        <?=$seance->getHeureDebut()?> - <?=$seance->getHeureFin()?>
                    </button>
                </form>
                <br>
            <?php } ?>
            <br>
        </div>
        </div>

        </div>
    <br>
</header>


<footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5"></div></footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>