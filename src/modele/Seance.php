<?php

class Seance
{
    private $idSeance;
    private $refFilm;
    private $date;
    private $heureDebut;
    private $heureFin;
    private $refSalle;
    private $placesDispo;

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
    public function getRefFilm()
    {
        return $this->refFilm;
    }

    /**
     * @param mixed $refFilm
     */
    public function setRefFilm($refFilm)
    {
        $this->refFilm = $refFilm;
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
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * @param mixed $heureDebut
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;
    }

    /**
     * @return mixed
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * @param mixed $heureFin
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;
    }

    /**
     * @return mixed
     */
    public function getRefSalle()
    {
        return $this->refSalle;
    }

    /**
     * @param mixed $refSalle
     */
    public function setRefSalle($refSalle)
    {
        $this->refSalle = $refSalle;
    }

    /**
     * @return mixed
     */
    public function getPlacesDispo()
    {
        return $this->placesDispo;
    }

    /**
     * @param mixed $placesDispo
     */
    public function setPlacesDispo($placesDispo)
    {
        $this->placesDispo = $placesDispo;
    }

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
}

