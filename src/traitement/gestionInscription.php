<?php
require_once"../modele/User.php";
require_once"../repository/UserRepository.php";
if (!empty($_POST["email"]) &&
    !empty($_POST["nom"]) &&
    !empty($_POST["prenom"]) &&
    !empty($_POST["mdp"]) &&
    !empty($_POST["mdpC"])) {


        if(($_POST["mdp"]==$_POST["mdpC"])) {
            $userRepository = new UserRepository();
            $nbUser=$userRepository->nombreUtilisateur();
            if($nbUser==0) {
                $role="admin";
            }else{
                $role="user";
            }
        $user = new User([
            "email" => $_POST["email"],
            "nom" => $_POST["nom"],
            "prenom" => $_POST["prenom"],
            "mdp" => $_POST["mdp"],
            "role"=> $role
        ]);
        $user = $userRepository->inscription($user);

        session_start();
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["mdp"] = $_POST["mdp"];
        $_SESSION["role"] = $role;
        $_SESSION["nom"] = $_POST["nom"];
        $_SESSION["prenom"] = $_POST["prenom"];
        $_SESSION["connexion"] = true;

        header("Location: ../../index.php?parametre=inscrit");
    } else {
        header("Location: ../../vue/inscription.php?parametre=mdp");
    }

}

else{
    header("Location: ../../vue/inscription.php?parametre=champsVides");
}
