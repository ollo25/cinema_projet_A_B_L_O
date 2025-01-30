<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CINEMAX</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
<script>
    // Vérifier si l'URL contient le paramètre "connected=true"
    const urlParams = new URLSearchParams(window.location.search);
    const isConnected = urlParams.get('connected') === 'true';

    if (isConnected) {
        // Afficher le popup
        const popupHtml = `
            <div class="overlay" id="overlay"></div>
            <div class="popup" id="popup">
                <h2>Vous êtes connecté !</h2>
                <button id="closePopup">Fermer</button>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', popupHtml);

        const popup = document.getElementById("popup");
        const overlay = document.getElementById("overlay");
        const closePopup = document.getElementById("closePopup");

        // Afficher le popup et l'overlay
        popup.style.display = "block";
        overlay.style.display = "block";

        // Fermer le popup en cliquant sur le bouton
        closePopup.addEventListener("click", () => {
            popup.style.display = "none";
            overlay.style.display = "none";
        });
    }
</script>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="vue/connexion.php">Connexion</a></li>
                <li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>
                <li class="nav-item"><a class="nav-link" href="vue/contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
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
                <div style="text-align: center;">
                    <h1><strong><u>À la une</u></strong></h1>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="#" class="card-link"><i class="bi bi-camera-reels-fill"></i>Bande-annonce</a></li>
                                    <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                    <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                    <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                    <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                        <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                        <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                        <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                        <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card mb-4">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                            <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card mb-4">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                            <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card mb-4">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                            <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card mb-4">
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                            <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card mb-4">
                                                <img src="..." class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                                    <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mb-4">
                                                <img src="..." class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                                    <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mb-4">
                                                <img src="..." class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                                    <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card mb-4">
                                                <img src="..." class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="#" class="card-link">Bande-annonce</a></li>
                                                    <li class="list-group-item"><a href="#" class="card-link">Réserver</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" >
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-primary">1</button>
                                                <button type="button" class="btn btn-primary">2</button>
                                                <button type="button" class="btn btn-primary">3</button>
                                                <button type="button" class="btn btn-primary">4</button>
                                            </div>
                </body>
                </html>

