<?php
session_start();
require_once "../src/bdd/Bdd.php";

$bdd = new bdd();
$db = $bdd->getBdd();

$sql = "SELECT * FROM user";
$stmt = $db->prepare($sql);
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>
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
                    <?php foreach ($user as $users): ?>
                    <tr>
                        <td><?= ($users['id_user']) ?></td>
                        <td><?= ($users['nom']) ?></td>
                        <td><?= ($users['prenom']) ?></td>
                        <td><?= ($users['email']) ?></td>
                        <td><?= ($users['role']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <h2> Inserer l'ID de l'utilisateur a modifier / supprimer : </h2>

                <form action="modifUser.php" method="post">
                    <label >ID : </label>
                    <input name="idSaisie" type="number" required>
                    <button class="btn btn-primary" style="margin-top: 10px;" type="submit">Continuer</button>
                </form>
            </div>
        </div>
    </div>
</header>
