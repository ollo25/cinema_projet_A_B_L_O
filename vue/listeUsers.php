<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/User.php";
require_once "../src/repository/UserRepository.php";

session_start();
if (!isset($_SESSION['connexionAdmin'])) {
    header('location: ../index.php?parametre=fakeAdmin');
} elseif (!$_SESSION['connexionAdmin']) {
    header('location: ../index.php?parametre=fakeAdmin');
}

$user=new UserRepository();
$listeUser=$user->listeUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CINEMAX</title>


</head>
<body id="page-top">

<?php require_once 'PopUp.php';
if(isset($_GET['parametre'])){
    if($_GET['parametre']=="modificationReussie"){
        $pop = new PopUp();
        $pop->showPopup("Modification du rôle réussie");
    }
    if($_GET['parametre']=="suprresionReussie"){
        $pop = new PopUp();
        $pop->showPopup("Suppression de l'utilisateur reussie");
    }
    if($_GET['parametre']=="erreur"){
        $pop = new PopUp();
        $pop->showPopup("Erreur");
    }

} ?>
<!-- Navigation-->
<a class="navbar-brand" href="indexADMIN.php"> index Admin </a>
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1>CINEMAX ADMIN - Liste des utilisateurs</h1>
                <br>
                <table border="2">
                    <tr>
                        <td>ID</td>
                        <td>nom</td>
                        <td>prenom</td>
                        <td>email</td>
                        <td>role</td>
                    </tr>

                    <?php
                    /** @var User $listeUsers */
                    foreach ($listeUser as $listeUsers): ?>
                    <tr>
                        <td><?= ($listeUsers->getIdUser()) ?></td>
                        <td><?= ($listeUsers->getNom()) ?></td>
                        <td><?= ($listeUsers->getPrenom()) ?></td>
                        <td><?= ($listeUsers->getEmail()) ?></td>
                        <td><?= ($listeUsers->getRole()) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <h2> Inserer l'ID de l'utilisateur a modifier / supprimer : </h2>

                <form action="../src/traitement/GestionUser.php" method="post">
                    <label >ID : </label>
                    <select name="idSaisie" required>
                    <?php
                    /** @var User $user */
                    foreach ($listeUser as $user): ?>
                        <option value="<?=$user->getIdUser()?>"><?=$user->getEmail()?></option>
                    <?php endforeach; ?>
                    </select>
                    <br>
                    <button name="button" value="admin" class="btn btn-primary" style="margin-top: 10px;" type="submit">Admin</button>
                    <button name="button" value="suppr" class="btn btn-primary" style="margin-top: 10px;" type="submit">Supprimer</button>
                    <button name="button" value="user" class="btn btn-primary" style="margin-top: 10px;" type="submit">User</button>

                </form>
            </div>
        </div>
    </div>
</header>
