<?php
class FilmRepository{
    public function recupererFilms(){
        $films = [];
        $bdd = new Bdd();
        $datebase = $bdd ->getBdd();
        $req = $datebase->prepare('SELECT * FROM film');
        $req->execute();
        $filmsBdd = $req->fetchAll();
        foreach($filmsBdd as $filmBdd){
            $films[] = new Film([
                'idFilm' => $filmBdd['id_film'],
                'titre' => $filmBdd['titre'],
                'genre' => $filmBdd['genre'],
                'duree' => $filmBdd['duree'],
                'affiche' => $filmBdd['affiche'],
                'description' => $filmBdd['description'],
            ]);
        }
        return $films;
    }
}