<?php

class SeanceRepository
{

    public function recupererSeance()
    {
        $bdd = new Bdd();
        $datebase = $bdd->getBdd();
        $req = $datebase->prepare('SELECT * FROM seance');
        $req->execute();
        $seancesBdd = $req->fetchAll();
        $seance=[];
        foreach ($seancesBdd as $seanceBdd) {
            $seance[] = new Seance([
                'idSeance' => $seanceBdd['id_seance'],
                'refFilm' => $seanceBdd['ref_film'],
                'date' => $seanceBdd['date'],
                'heureDebut' => $seanceBdd['heure_debut'],
                'heureFin' => $seanceBdd['heure_fin'],
                'refSalle' => $seanceBdd['ref_salle'],
                'placesDispo' => $seanceBdd['places_dispo'],
            ]);
        }
        return $seance;
    }
    public function nvSeance(Seance $seance) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO seance (ref_film, date, heure_debut,heure_fin,ref_salle,places_dispo) VALUES (:ref_film,:date,:heure_debut,:heure_fin,:ref_salle,:places_dispo)');
        $req->execute([
            'ref_film' => $seance->getRefFilm(),
            'date' => $seance->getDate(),
            'heure_debut' => $seance->getHeureDebut(),
            'heure_fin' => $seance->getHeureFin(),
            'ref_salle' => $seance->getRefSalle(),
            'places_dispo' => $seance->getPlacesDispo()
        ]);
        return $seance;
    }
    public function recupererFilmTitreLierASeance($id_seance) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("SELECT f.titre FROM film f WHERE f.id_film = (SELECT s.ref_film FROM seance s WHERE s.id_seance = :id_seance)");

        $req->execute(array('id_seance' => $id_seance));
        $filmBdd = $req->fetch();
        $filmTitre = $filmBdd['titre'];


        return $filmTitre;
    }
    public function recupererSalleNumLierASeance($id_seance) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("SELECT sa.numero FROM salle sa WHERE sa.id_salle = (SELECT s.ref_salle FROM seance s WHERE s.id_seance = :id_seance)");

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
    public function recupererSeanceLierASFilm($ref_film) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("SELECT id_seance, date, heure_debut, heure_fin FROM seance AS s WHERE s.ref_film = :ref_film;");

        $req->execute(array('ref_film' => $ref_film));
        $seanceBdd = $req->fetchAll();

        $seances = [];

        foreach ($seanceBdd as $seancesBdd) {
            $seances[] = new Seance([
                "idSeance" => $seancesBdd['id_seance'],
                "date" => $seancesBdd['date'],
                "heureDebut" => $seancesBdd['heure_debut'],
                "heureFin" => $seancesBdd['heure_fin'],
            ]);
        }
        return $seances;
    }



}