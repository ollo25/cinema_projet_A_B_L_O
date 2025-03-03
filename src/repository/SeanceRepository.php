<?php

class SeanceRepository
{

    public function recupererSeance()
    {
        $seance = [];
        $bdd = new Bdd();
        $datebase = $bdd->getBdd();
        $req = $datebase->prepare('SELECT * FROM seance');
        $req->execute();
        $seancesBdd = $req->fetchAll();
        foreach ($seancesBdd as $seanceBdd) {
            $seance[] = new Seance([
                'idSeance' => $seanceBdd['id_seance'],
                'idFilm' => $seanceBdd['id_film'],
                'date' => $seanceBdd['date'],
                'heureDebut' => $seanceBdd['heure_debut'],
                'heureFin' => $seanceBdd['heure_fin'],
                'idSalle' => $seanceBdd['id_salle'],
                'placeDispo' => $seanceBdd['place_dispo'],
            ]);
        }
        return $seance;
    }
    public function nvSeance(Seance $seance) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO seance (id_film, date, heure_debut,heure_fin,id_salle,place_dispo) VALUES (:id_film,:date,:heure_debut,:heure_fin,:id_salle,:place_dispo)');
        $req->execute([
            'id_film' => $seance->getIdFilm(),
            'date' => $seance->getDate(),
            'heure_debut' => $seance->getHeureDebut(),
            'heure_fin' => $seance->getHeureFin(),
            'id_salle' => $seance->getIdSalle(),
            'place_dispo' => $seance->getPlaceDispo()
        ]);
        return $seance;
    }
    public function recupererFilmTitreLierASeance($id_seance) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("SELECT f.titre FROM film f WHERE f.id_film = (SELECT s.id_film FROM seance s WHERE s.id_seance = :id_seance)");

        $req->execute(array('id_seance' => $id_seance));
        $filmBdd = $req->fetch();
        $filmTitre = $filmBdd['titre'];


        return $filmTitre;
    }
    public function recupererSalleNumLierASeance($id_seance) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("SELECT sa.numero FROM salle sa WHERE sa.id_salle = (SELECT s.id_salle FROM seance s WHERE s.id_seance = :id_seance)");

        $req->execute(array('id_seance' => $id_seance));
        $salleBdd = $req->fetch();
        $salleNum = $salleBdd['numero'];


        return $salleNum;
    }
    public function deleteSeance(Seance $seance){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM seance WHERE id_seance = :id_seance");
        $req->execute(array(
            "id_seance"=>$seance->getIdSeance()
        ));
        return $seance;
    }
    public function recupererInfoUniqueSeance(Seance $seance){
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('SELECT * FROM seance WHERE id_seance = :id_seance');
        $req->execute(array(
            "id_seance" => $seance->getIdSeance()
        ));
        $seanceBdd = $req->fetch();
        return new Seance([
            'idSeance' => $seanceBdd['id_seance'],
            'idFilm' => $seanceBdd['id_film'],
            'date' => $seanceBdd['date'],
            'heureDebut' => $seanceBdd['heure_debut'],
            'heureFin' => $seanceBdd['heure_fin'],
            'idSalle' => $seanceBdd['id_salle'],
            'placeDispo' => $seanceBdd['place_dispo'],
        ]);

    }
    public function updateSeance(Seance $seance) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('UPDATE seance SET id_film = :id_film, date = :date, heure_debut = :heure_debut, heure_fin = :heure_fin, id_salle = :id_salle WHERE id_seance = :id_seance');
        $seance = $req->execute([
            'id_seance' => $seance->getIdSeance(),
            'id_film' => $seance->getidFilm(),
            'date' => $seance->getDate(),
            'heure_debut' => $seance->getheureDebut(),
            'heure_fin' => $seance->getheureFin(),
            'id_salle' => $seance->getIdSalle()
        ]);
        return $seance;
    }



}