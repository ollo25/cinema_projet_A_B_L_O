<!DOCTYPE html>
<html lang="en">


<body>
<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/Film.php";
require_once "../src/repository/FilmRepository.php";

$film=new FilmRepository();
$listeFilm=$film->recupererFilms();
?>
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1>CINEMAX ADMIN - Liste des utilisateurs</h1>
                <br>
                <table border="2">
                    <tr>
                        <td>ID</td>
                        <td>Titre</td>
                        <td>Description</td>
                        <td>Durée</td>
                        <td>Genre</td>
                        <td>Affiche</td>
                    </tr>

                    <?php
                    /** @var User $ */
                    foreach ($listeFilm as $listeFilms): ?>
                        <tr>
                            <td><?= ($listeFilms->getIdFilm()) ?></td>
                            <td><?= ($listeFilms->getTitre()) ?></td>
                            <td><?= ($listeFilms->getDescription()) ?></td>
                            <td><?= ($listeFilms->getDuree()) ?></td>
                            <td><?= ($listeFilms->getGenre()) ?></td>
                            <td><?= ($listeFilms->getAffiche()) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <h2> Inserer l'ID de l'utilisateur a modifier / supprimer : </h2>

                <form action="../src/traitement/modifUser.php" method="post">
                    <label >Films :</label>
                    <select name="idSaisie" required>
                        <?php
                        /** @var User $user */
                        foreach ($listeFilm as $film): ?>
                            <option value="<?=$film->getIdFilm()?>"><?=$film->getTitre()?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <button name="button" value="nvFilm" class="btn btn-primary" style="margin-top: 10px;" type="submit">Enregistrer un nouveau film</button>
                    <button name="button" value="suppr" class="btn btn-primary" style="margin-top: 10px;" type="submit">Supprimer</button>
                    <button name="button" value="modifier" class="btn btn-primary" style="margin-top: 10px;" type="submit">Modifier le film</button>

                </form>
            </div>
        </div>
    </div>
</header>
</body>
</html>