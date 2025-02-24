
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CINEMAX</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
<?php
require_once 'vue/PopUp.php';
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
            <?php
            session_start();

            if (!isset($_SESSION['connexion'])) {
                $_SESSION['connexion'] = false;
            }

            if (!empty($_GET['deco']) && $_GET['deco'] == 'true') {
                $_SESSION['connexion'] = false;
                header("Location: index.php");
            }

            if ($_SESSION['connexion'] === true) { ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php?deco=true">Déconnexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="vue/contact.php">Contact</a></li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="vue/connexion.php">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="vue/inscription.php">Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href="vue/contact.php">Contact</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1>CINEMAX</h1>
                <br>
                <br>
                <a class="btn btn-primary" href="vue/pageCatalogue.php">Reservation</a>
            </div>
        </div>
    </div>
</header>
<!-- About-->
<!-- Projects-->
<!-- Signup-->
<!-- Contact-->
<!-- Footer-->
<footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div></footer>
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
