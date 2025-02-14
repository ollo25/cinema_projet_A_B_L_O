<?php
require_once "../bdd/Bdd.php";
require_once "../modele/User.php";
require_once "../repository/UserRepository.php";
$idUser = $_POST['idSaisie'];
if (isset($_POST['button'])){
    if($_POST['button'] == "suppr" || $_POST['button'] == "user"){
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


if(isset($_POST['user'])){
    $role = $_POST['user'];
}
elseif(isset($_POST['admin'])){
    $role = $_POST['admin'];
}
if (isset($_POST['suppr'])){

}

?>
<!DOCTYPE html>
<html lang="fr">