<?php
require_once '../modele/User.php';
require_once"../repository/UserRepository.php";

session_start();
if (empty($_POST['emailCo']) || empty($_POST['mdpCo'])) {
    $_SESSION["connexion"] = false;
    $_SESSION["infoManquante"] = true;
    header("Location: ../../vue/connexion.php");
    exit();
}else{
    $user = new User([
        'email' => $_POST["emailCo"],
        'mdp' => $_POST["mdpCo"]
    ]);
    $userRepository = new UserRepository();
    $user = $userRepository->connexion($user);
    var_dump($user);
    if(!empty($user->getIdUser())){

        if($user->getRole() == "admin"){
            header("Location: ../../connexionAdmin.php");
        }else{
            echo "flop";
        }
    }else{
        $_SESSION["connexion"] = false;
        $_SESSION["infoIncorrect"] = true;
        header("Location: ../../vue/connexion.php");
    }
}
