<?php
session_start();
if (empty($_POST['emailCo']) || empty($_POST['mdpCo'])) {
    $_SESSION["connexion"] = false;
    $_SESSION["infoManquante"] = true;
    header("Location: connexion.php");
    exit();
}

$bdd = new PDO('mysql:host=localhost;dbname=lom_gestion_cinema;charset=utf8', 'root', '');
$req = $bdd->prepare('SELECT * FROM user WHERE email = :email AND mdp = :mdp');
$req->execute(array(
    'email' => $_POST['emailCo'],
    'mdp' => $_POST['mdpCo']
));
$utilisateur = $req->fetch();

if ($utilisateur["role"] == "admin"){
    $_SESSION["email"] = $utilisateur["email"];
    $_SESSION["mdp"] = $utilisateur["mdp"];
    $_SESSION["role"] = "user";
    $_SESSION["nom"] = $utilisateur["nom"];
    $_SESSION["prenom"] = $utilisateur["prenom"];
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