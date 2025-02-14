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
                'heure_debut' => $seanceBdd['heure_debut'],
                'heure_fin' => $seanceBdd['heure_fin'],
                'idSalle' => $seanceBdd['id_salle'],
                'placeDispo' => $seanceBdd['place_dispo'],
            ]);
        }
        return $seance;
    }


}