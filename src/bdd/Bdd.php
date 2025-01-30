<?php

class bdd{
    public function getBdd(){
        return new PDO('mysql:host=localhost;dbname=lom_gestion_cinema;charset=utf8','root','');
    }
}