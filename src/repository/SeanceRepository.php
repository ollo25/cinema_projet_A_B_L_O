<?php

class SeanceRepository
{
    public function recupererSeance()
    {
        $bdd = new Bdd();
        $datebase = $bdd->getBdd();

        $req = $datebase->prepare('SELECT s.id_seance, f.titre,s.date, s.heure_debut,s.heure_fin, sa.numero, s.places_dispo FROM seance s INNER JOIN film f ON s.ref_film = f.id_film INNER JOIN salle sa ON s.ref_salle = sa.id_salle');

        $req->execute();
        $seanceBdd = $req->fetchAll();
        $seance = [];
        foreach ($seanceBdd as $seancesBdd) {
            $seance[] = [
                'idSeance' => $seancesBdd['id_seance'],
                'titreFilm' => $seancesBdd['titre'],
                'date' => $seancesBdd['date'],
                'heureDebut' => $seancesBdd['heure_debut'],
                'heureFin' => $seancesBdd['heure_fin'],
                'numero' => $seancesBdd['numero'],
                'placesDispo' => $seancesBdd['places_dispo']
            ];
        }

        return $seance;
    }
    public function recupererInfoUniqueSeance(Seance $seances)
    {
        $bdd = new Bdd();
        $datebase = $bdd->getBdd();

        $req = $datebase->prepare('SELECT s.id_seance,s.ref_salle, f.titre,s.date, s.heure_debut,s.heure_fin, sa.numero, s.places_dispo FROM seance s INNER JOIN film f ON s.ref_film = f.id_film INNER JOIN salle sa ON s.ref_salle = sa.id_salle WHERE id_seance = :id_seance');

        $req->execute([
            'id_seance' => $seances->getIdSeance()
        ]);
        $seanceBdd = $req->fetchAll();
        $seance = [];
        foreach ($seanceBdd as $seancesBdd) {
            $seance[] = [
                'idSeance' => $seancesBdd['id_seance'],
                'refSalle' => $seancesBdd['ref_salle'],
                'titreFilm' => $seancesBdd['titre'],
                'date' => $seancesBdd['date'],
                'heureDebut' => $seancesBdd['heure_debut'],
                'heureFin' => $seancesBdd['heure_fin'],
                'numero' => $seancesBdd['numero'],
                'placesDispo' => $seancesBdd['places_dispo']
            ];
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

    public function deleteSeance(Seance $seance){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM seance WHERE id_seance = :id_seance");
        $req->execute(array(
            "id_seance"=>$seance->getIdSeance()
        ));
        return $seance;
    }

    public function updateSeance(Seance $seance) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('UPDATE seance SET ref_film = :ref_film, date = :date, heure_debut = :heure_debut, heure_fin = :heure_fin, ref_salle = :ref_salle WHERE id_seance = :id_seance');
        $seance = $req->execute([
            'id_seance' => $seance->getIdSeance(),
            'ref_film' => $seance->getRefFilm(),
            'date' => $seance->getDate(),
            'heure_debut' => $seance->getheureDebut(),
            'heure_fin' => $seance->getheureFin(),
            'ref_salle' => $seance->getRefSalle()
        ]);
        return $seance;
    }
    public function recupererSeanceLierAFilm($ref_film) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare("SELECT id_seance, date, heure_debut, heure_fin, places_dispo FROM seance AS s WHERE s.ref_film = :ref_film;");

        $req->execute(array('ref_film' => $ref_film));
        $seanceBdd = $req->fetchAll();

        $seances = [];

        foreach ($seanceBdd as $seancesBdd) {
            $seances[] = new Seance([
                "idSeance" => $seancesBdd['id_seance'],
                "date" => $seancesBdd['date'],
                "heureDebut" => $seancesBdd['heure_debut'],
                "heureFin" => $seancesBdd['heure_fin'],
                "placesDispo"=> $seancesBdd['places_dispo'],
            ]);
        }
        return $seances;
    }



}