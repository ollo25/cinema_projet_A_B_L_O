<?php
session_start();
if (empty($_POST['emailCo']) || empty($_POST['mdpCo'])) {
    $_SESSION["connexion"] = false;
    $_SESSION["infoManquante"] = true;
    header("Location: connexion.php");
    exit();
}
$user = new User([
    'email' => $_POST["emailCo"],
    'mdp' => $_POST["mdpCo"]
]);
$userRepository = new UserRepository();
$user = $userRepository->connexion($user);
if(!empty($user->getIdUser())){
    $_SESSION["user"] = $user;
    if($user->getRole() == "admin"){
        header("Location: connexionAdmin.php");
    }else{
        header("Location: connexion.php");
    }
}else{
    header("Location: connexion.php");
}

if ($user->getRole() == "admin"){
    $_SESSION["connexion"] = true;
    header('Location: indexADMIN.php');
} elseif ($utilisateur ) {
    $_SESSION["email"] = $utilisateur["email"];
    $_SESSION["mdp"] = $utilisateur["mdp"];
    $_SESSION["role"] = "user";
    $_SESSION["nom"] = $utilisateur["nom"];
    $_SESSION["prenom"] = $utilisateur["prenom"];
    $_SESSION["connexion"] = true;
    header('Location: pageReservation.php');
} else {
    $_SESSION["connexion"] = false;
    $_SESSION["infoIncorrect"] = true;
    header("Location: connexion.php");
}
?>