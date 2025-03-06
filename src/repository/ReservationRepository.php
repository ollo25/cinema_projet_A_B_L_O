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
                'refUser' => $reservationsBdd['ref_user'],
                'refSeance' => $reservationsBdd['ref_seance'],
            ]);
            return $reservations;
        }
    }
    public function deleteReservation(Reservation $reservation){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM reservation WHERE id_reservation = :id_reservation");
        $req->execute(array(
            "id_reservation"=>$reservation->getIdReservation()
        ));
        return $reservation;
    }
}