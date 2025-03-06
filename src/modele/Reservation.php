<?php

class Reservation
{
    private $idReservation;
    private $refUser;
    private $refSeance;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }


    private function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set' . ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * @param mixed $idReservation
     */
    public function setIdReservation($idReservation)
    {
        $this->idReservation = $idReservation;
    }

    /**
     * @return mixed
     */
    public function getRefUser()
    {
        return $this->refUser;
    }

    /**
     * @param mixed $refUser
     */
    public function setRefUser($refUser)
    {
        $this->refUser = $refUser;
    }

    /**
     * @return mixed
     */
    public function getRefSeance()
    {
        return $this->refSeance;
    }

    /**
     * @param mixed $refSeance
     */
    public function setRefSeance($refSeance)
    {
        $this->refSeance = $refSeance;
    }



}