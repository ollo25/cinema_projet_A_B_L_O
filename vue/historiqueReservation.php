<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/repository/ReservationRepository.php";
session_start();
if(isset($_SESSION["connexion"])){
    if(!$_SESSION["connexion"]){
        header("Location: ../index.php?parametre=login");
    }
}
else{header("Location: ../index.php?parametre=login");}
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
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="../index.php?erreur=1">CINEMAX - Accueil </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">

            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">

    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center" style="padding-top: 80px;">
        <?php
        $reservationRepo = new ReservationRepository();
        $reservation = $reservationRepo->recupererReservationsselonUser($_SESSION["id_user"]);
        ?>

        <div class="reservation container ">
            <?php if(empty($reservation)){?>
                <div class="text-center">Vous n'avez réservé aucune séance.</div>
            <?php }else{ ?>
            <table class="reservation-table" border="2">
                <tr>
                    <th>Film</th>
                    <th>Date</th>
                    <th>Heure de début de la séance</th>
                    <th>Date de réservation</th>
                    <th>Annuler la réservation</th>

                </tr>

                <?php
                foreach ($reservation as $reservations):?>
                    <tr>
                        <td><?= ($reservations['titreFilm'])?></td>
                        <td><?= ($reservations['dateSeance']) ?></td>
                        <td><?= ($reservations['heureDebut']) ?></td>
                        <td>Reservation datant du <?= ($reservations['dateReservation']) ?></td>
                        <td><a href="../src/traitement/gestionReservation.php?idReservation=<?= ($reservations['idReservation']) ?>">
                                <button>Annuler</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php }?>
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
