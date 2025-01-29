<?php

class Seance
{
    private $idSeance;
    private $idFilm;
    private $date;
    private $heure;
    private $idSalle;
    private $placeDispo;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    private function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set'.ucfirst($key);

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
    public function getIdSeance()
    {
        return $this->idSeance;
    }

    /**
     * @param mixed $idSeance
     */
    public function setIdSeance($idSeance)
    {
        $this->idSeance = $idSeance;
    }

    /**
     * @return mixed
     */
    public function getIdFilm()
    {
        return $this->idFilm;
    }

    /**
     * @param mixed $idFilm
     */
    public function setIdFilm($idFilm)
    {
        $this->idFilm = $idFilm;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * @return mixed
     */
    public function getIdSalle()
    {
        return $this->idSalle;
    }

    /**
     * @param mixed $idSalle
     */
    public function setIdSalle($idSalle)
    {
        $this->idSalle = $idSalle;
    }

    /**
     * @return mixed
     */
    public function getPlaceDispo()
    {
        return $this->placeDispo;
    }

    /**
     * @param mixed $placeDispo
     */
    public function setPlaceDispo($placeDispo)
    {
        $this->placeDispo = $placeDispo;
    }

}