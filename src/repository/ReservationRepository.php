<?php
class ReservationRepository{
    public function recupererReservations()
    {
        $reservations = [];
        $bdd = new Bdd();
        $datebase = $bdd->getBdd();
        $req = $datebase->prepare('SELECT * FROM reservation');
        $req->execute();
        $reservationBdd = $req->fetchAll();

        foreach ($reservationBdd as $reservationsBdd) {
            $reservations[] = new Reservation([
                'idReservation' => $reservationsBdd['id_reservation'],
                'idUser' => $reservationsBdd['id_user'],
                'idSeance' => $reservationsBdd['id_seance'],
            ]);
            return $reservations;
        }
    }
    public function deleteReservation(Reservation $reservation){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM film WHERE id_film = :id_film");
        $req->execute(array(
            "id_film"=>$reservation->getIdReservation()
        ));
        return $reservation;
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

}