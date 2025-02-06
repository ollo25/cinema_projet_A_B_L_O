<?php
require_once '../modele/User.php';
require_once"../repository/UserRepository.php";

session_start();
if (empty($_POST['emailCo']) || empty($_POST['mdpCo'])) {
    $_SESSION["connexion"] = false;
    header("Location: ../../vue/connexion.php?erreur=infoManquante");
    exit();
}else{
    $user = new User([
        'email' => $_POST["emailCo"],
        'mdp' => $_POST["mdpCo"]
    ]);
    $userRepository = new UserRepository();
    $user = $userRepository->connexion($user);

    if(!empty($user->getIdUser())){

        if($user->getRole() == "admin"){
            header("Location: ../../vue/indexADMIN.php");
        }else{
            header("../../vue/pageReservation.php");
        }
    }else{
        $_SESSION["connexion"] = false;
        header("Location: ../../vue/connexion.php?erreur=emailmdpInvalide");
    }
}
