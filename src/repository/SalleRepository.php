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
    public function deleteSalle(Salle $salle){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM salle WHERE id_salle = :id_salle");
        $req->execute(array(
            "id_salle"=>$salle->getIdSalle()
        ));
        return $salle;
    }
    public function recupererInfoUniqueSalle(Salle $salle){
            $bdd = new Bdd();
            $database = $bdd->getBdd();
            $req = $database->prepare('SELECT * FROM salle WHERE id_salle = :id_salle');
            $req->execute(array(
                "id_salle" => $salle->getIdSalle()
            ));
            $salleBdd = $req->fetch();
            return new Salle([
                'nbPlaces' => $salleBdd['nb_place'],
                'numero' => $salleBdd['numero'],
            ]);

    }
    public function updateSalle(Salle $salle) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('UPDATE salle SET numero = :numero, nb_place = :nb_place WHERE id_salle = :id_salle');
        $salle = $req->execute([
            'id_salle' => $salle->getIdSalle(),
            'numero' => $salle->getNumero(),
            'nb_place' => $salle->getNbPlaces(),
        ]);
        return $salle;
    }
    public function nvSalle(Salle $salle) {
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('INSERT INTO salle (numero, nb_place) VALUES (:numero, :nb_place)');
        $req->execute([
            'numero' => $salle->getNumero(),
            'nb_place' => $salle->getNbPlaces(),
        ]);
        return $salle;
    }
}