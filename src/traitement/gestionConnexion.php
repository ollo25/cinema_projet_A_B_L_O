<?php
require_once '../modele/User.php';
require_once"../repository/UserRepository.php";
require_once "../bdd/Bdd.php";
session_start();
if (empty($_POST['emailCo']) || empty($_POST['mdpCo'])) {

    header("Location: ../../vue/connexion.php?parametre=infoManquante");
}
else{
    var_dump($_POST);
    $user = new User([
        'email' => $_POST["emailCo"]
    ]);
    $userRepository = new UserRepository();
    $user = $userRepository->connexion($user);
    var_dump($user);
    if(!empty($user->getIdUser())){
        if(password_verify($_POST['mdpCo'],$user->getMdp())){
            if($user->getRole() == "admin"){
                $_SESSION["connexionAdmin"] = true;
                header("Location: ../../vue/indexADMIN.php");
            }else{

                header("Location: ../../vue/pageCatalogue.php");
            }
        }
        else{

            header("Location: ../../vue/connexion.php?parametre=emailmdpInvalide");
        }

    }else{

        header("Location: ../../vue/connexion.php?parametre=emailmdpInvalide");
    }
}
