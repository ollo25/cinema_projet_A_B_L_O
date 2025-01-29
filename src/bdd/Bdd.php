<?php

class bdd{
    public function getBdd(){
        $bdd = new PDO('mysql:host=localhost;dbname=omnes;charset=utf8','root','');
    }
}