<?php
class SalleRepository{
    public function recupererSalle(){
        $salle = [];
        $bdd = new Bdd();
        $datebase = $bdd ->getBdd();
        $req = $datebase->prepare('SELECT * FROM salle');
        $req->execute();
        $sallesBdd = $req->fetchAll();
        foreach($sallesBdd as $salleBdd){
            $salle[] = new Salle([
                'idSalle' => $salleBdd['id_salle'],
                'nbPlaces' => $salleBdd['nb_place'],
                'numero' => $salleBdd['numero'],
            ]);
        }
        return $salle;
    }
    public function recupererNbPlacesLierASalle($id_salle) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("SELECT nb_place FROM salle WHERE id_salle = :id_salle");

        $req->execute(array('id_salle' => $id_salle));
        $salleBdd = $req->fetch();
        $salleNbPlaces = $salleBdd['nb_place'];


        return $salleNbPlaces;
    }
    public function deleteFilm(Film $film){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM film WHERE id_film = :id_film");
        $req->execute(array(
            "id_film"=>$film->getIdFilm()
        ));
        return $film;
    }
    public function recupererInfoUniqueFilm(Film $film){
            $bdd = new Bdd();
            $database = $bdd->getBdd();
            $req = $database->prepare('SELECT * FROM film WHERE id_film = :id_film');
            $req->execute(array(
                "id_film" => $film->getIdFilm()
            ));
            $filmsBdd = $req->fetch();
            return new Film([
                'idFilm' => $filmsBdd['id_film'],
                'titre' => $filmsBdd['titre'],
                'genre' => $filmsBdd['genre'],
                'duree' => $filmsBdd['duree'],
                'affiche' => $filmsBdd['affiche'],
                'description' => $filmsBdd['description'],
            ]);

    }
    public function updateFilm(Film $film) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('UPDATE film SET titre = :titre, genre = :genre, duree = :duree, affiche = :affiche, description = :description WHERE id_film = :id_film');
        $film = $req->execute([
            'id_film' => $film->getIdFilm(),
            'titre' => $film->getTitre(),
            'genre' => $film->getGenre(),
            'duree' => $film->getDuree(),
            'affiche' => $film->getAffiche(),
            'description' => $film->getDescription()
        ]);
        return $film;
    }
    public function nvFilm(Film $film) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO film (titre, description, genre, duree, affiche) VALUES (:titre, :description, :genre, :duree, :affiche)');
        $req->execute([
            'titre' => $film->getTitre(),
            'description' => $film->getDescription(),
            'genre' => $film->getGenre(),
            'duree' => $film->getDuree(),
            'affiche' => $film->getAffiche()
        ]);
        return $film;
    }
}