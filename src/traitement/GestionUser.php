<?php
require_once "../bdd/Bdd.php";
require_once "../modele/User.php";
require_once "../repository/UserRepository.php";
$idUser = $_POST['idSaisie'];
var_dump($_POST);
if (isset($_POST['button'])){
    echo "sgdfgdghd";
    if($_POST['button'] == "admin" || $_POST['button'] == "user"){
        if($_POST['button'] == "admin"){
            $role= "admin";
        }
        elseif($_POST['button'] == "user"){
            $role="user";
        }
        $user=new User([
                "idUser"=>$idUser,
                "role"=>$role
            ]
        );
        $userRepo=new UserRepository();
        $test = $userRepo->modifUser($user);
        if($test){
            header("Location:../../vue/listeUsers.php?parametre=modificationReussie");
        }
        else{
            header("Location:../../vue/listeUsers.php?parametre=erreur");
        }
    }
    elseif($_POST['button']=='suppr'){
        $user=new User([
                "idUser"=>$idUser
            ]
        );
        $userRepo=new UserRepository();
        $test = $userRepo->deleteUser($user);
        if($test){
            header("Location:../../vue/listeUsers.php?parametre=suppressionReussie");
        }
        else{
            header("Location:../../vue/listeUsers.php?parametre=erreur");
        }
    }
}


?>
<!DOCTYPE html>
<html lang="fr">