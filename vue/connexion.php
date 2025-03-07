<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cinemax - Connexion </title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
<?php
require_once 'PopUp.php';
if(isset($_GET['parametre'])){
    if($_GET['parametre']=="infoManquante"){
        $pop = new PopUp();
        $pop->showPopup("Les informations fournies sont incomplètes");
    }
    if($_GET['parametre']=="inconnu"){
        $pop = new PopUp();
        $pop->showPopup("Erreur");
    }
    if($_GET['parametre']=="emailmdpInvalide"){
        $pop = new PopUp();
        $pop->showPopup("L'email ou le mot de passe est incorrect");
    }
}

?>
<!-- Navigation-->
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
<!-- Masthead -->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center ">
                 <h3><u style="font-family: 'Helvetica Neue',serif"><strong>CONNEXION</strong></u></h3>
                <form action="../src/traitement/gestionConnexion.php" method="post">
                    <div class="input-group mb-3" style="margin-top: 10px;">
                        <span class="input-group-text">📧</span>
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-email" id="floatingInputGroup1" name="emailCo" placeholder="Email">
                            <label for="floatingInputGroup1">Email</label>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="margin-top: 10px;">
                        <span class="input-group-text">🔒</span>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingInputGroup2" name="mdpCo" placeholder="Mot de passe">
                            <label for="floatingInputGroup2">Mot de passe</label>
                        </div>
                    </div>
                    <?php
                    if(isset($_GET['connected']) && $_GET['erreur']=="infoManquante"){
                        echo "veuillez renseignez toutes vos informations";
                    }
                    if(isset($_GET['erreur']) && $_GET['erreur']=="emailmdpInvalide"){
                        echo "email ou mot de passe incorrect";
                    }
                    ?>
                    <div class="col-12">
                        <button class="btn btn-primary" style="margin-top: 10px;" type="submit">Se connecter</button>
                    </div>
                </form>
                <div class="lienInscription" style="margin-top: 10px;">
                    Nouveau? Je souhaite <a href="inscription.php" class="header-button">M'inscrire</a> !
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Footer -->
<footer class="footer bg-black small text-center text-white-50">
    <div class="container px-4 px-lg-5">Copyright &copy; Your CINEMAX 2025</div>
</footer>

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS -->
<script src="/assets/js/scripts.js"></script>
<!-- SB Forms JS -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
