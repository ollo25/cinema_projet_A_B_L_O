<?php
require_once '../modele/User.php';
require_once"../repository/UserRepository.php";
require_once "../bdd/Bdd.php";

session_start();
if (empty($_POST['emailCo']) || empty($_POST['mdpCo'])) {
    $_SESSION["connexion"] = false;
    header("Location: ../../vue/connexion.php?parametre=infoManquante");
}
else{
    $user = new User([
        'email' => $_POST["emailCo"],
        'mdp' => $_POST["mdpCo"]
    ]);
    $userRepository = new UserRepository();
    $user = $userRepository->connexion($user);

    if(!empty($user->getIdUser())){

        if($user->getRole() == "admin"){
            $_SESSION['connexionAdmin']=true;
            header("Location: ../../vue/indexADMIN.php");
        }else{
            $_SESSION["connexion"] = true;
            header("Location: ../../vue/pageCatalogue.php");
        }
    }else{
        $_SESSION["connexion"] = false;
        header("Location: ../../vue/connexion.php?parametre=emailmdpInvalide");
    }
}
