<?php
require_once"../modele/User.php";
require_once"../repository/UserRepository.php";
if($_POST["mdp"]==$_POST["mdpC"]) {
    if (
        isset($_POST["email"]) &&
        isset($_POST["nom"]) &&
        isset($_POST["prenom"]) &&
        isset($_POST["mdp"]) &&
        isset($_POST["mdpC"])) {
        $user = new User([
            "email" => $_POST["email"],
            "nom" => $_POST["nom"],
            "prenom" => $_POST["prenom"],
            "mdp" => $_POST["mdp"]
        ]);
        $userRepository = new UserRepository();
        $user = $userRepository->inscription($user);

        session_start();
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["mdp"] = $_POST["mdp"];
        $_SESSION["role"] = "user";
        $_SESSION["nom"] = $_POST["nom"];
        $_SESSION["prenom"] = $_POST["prenom"];
        $_SESSION["connexion"] = true;

        header("Location: ../../index.php?connected=true");
    } else {
        echo("Champs non rempli(s)");
    }

}

else{
    echo "Les mots de passes de ne sont pas identiques";
    echo "<form action='../../vue/Inscription.php' method='get'>
          <button type='submit'> retour page inscription</button>
          </form>";


}
