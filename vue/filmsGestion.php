<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/gestionFilms.css">

        <title>Gestion des films</title>
</head>
<body>
<div class="alert alert-secondary text-center" role="alert">
    <em> Vous êtes actuellement dans la page <u><strong>d'ajout d'un film</strong></u></em>
</div>

<div class="container">

    <u><h1 class="text-center gradient-text"> <strong>GESTIONS DES FILMS</strong> </h1></u>
    <br>
    <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-6">
            <label for="validationCustomTitre" class="form-label">Titre du film</label>
            <input type="text" class="form-control short-input" id="validationCustomTitre" name="titre" placeholder="Titre du film" required>
            <div class="invalid-feedback">
                Le titre du film est obligatoire!
            </div>
            <div class="valid-feedback">
                Valide
            </div>
        </div>

        <div class="col-md-6">
            <label for="validationCustomDescription" class="form-label">Description</label>
            <textarea class="form-control short-input" id="validationCustomDescription" name="description" placeholder="Description du film" style="height: 100px" required></textarea>
            <div class="invalid-feedback">
                Erreur, veuillez saisir une durée!
            </div>
            <div class="valid-feedback">
                Valide
            </div>
        </div>

        <div class="col-md-6">
            <label for="validationCustomDuree" class="form-label">Durée du film</label>
            <input type="number" class="form-control short-input" id="validationCustomDuree" name="duree" placeholder="Durée du film en minutes" required>
            <div class="invalid-feedback">
                Erreur, veuillez saisir une durée!
            </div>
            <div class="valid-feedback">
                Valide
            </div>
        </div>

        <div class="col-md-6">
            <label for="validationCustomGenre" class="form-label">Genre</label>
            <select class="form-select short-input" id="validationCustomGenre" name="genre" required>
                <option selected disabled value="">Sélectionner le genre</option>
                <option value="1">Comédie</option>
                <option value="2">Drame</option>
                <option value="3">Comédie dramatique</option>
                <option value="4">Thriller</option>
                <option value="5">Action / Aventure</option>
                <option value="6">Horreur</option>
                <option value="7">Science-fiction</option>
                <option value="8">Fantastique</option>
                <option value="9">Animation</option>
                <option value="10">Musical</option>
                <option value="11">Documentaire</option>
                <option value="12">Guerre</option>
                <option value="13">Western</option>
                <option value="14">Biopic</option>
                <option value="15">Comédie romantique</option>
                <option value="16">Historique</option>
                <option value="17">Retransmission</option>
                <option value="18">Court métrage</option>
            </select>
            <div class="invalid-feedback">
                Erreur, veuillez sélectionner un genre!
            </div>
            <div class="valid-feedback">
                Valide
            </div>
        </div>

        <div class="col-md-6 mx-auto text-center">
            <label for="validationCustomAffiche" class="form-label">Affiche</label>
            <input type="file" class="form-control short-input" id="validationCustomAffiche" name="affiche" required>
            <div class="invalid-feedback">
                Erreur, veuillez sélectionner une affiche!
            </div>
            <div class="valid-feedback">
                Valide
            </div>
        </div>
        <br>
        <br>
        <div class="col-12 text-center">
            <div class="form-check text-center">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Je confirme vouloir créer un nouveau film
                </label>
                <div class="invalid-feedback">
                    Erreur, toutes les informations ne sont pas complétées!
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-primary" type="submit">Créer un nouveau film</button>
        </div>
    </form>
</div>
</body>
<br>
<br>

</html>
