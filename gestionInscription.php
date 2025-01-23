<?php
if($_POST["mdp"]==$_POST["mdpC"]) {
    if (
        isset($_POST["email"]) &&
        isset($_POST["nom"]) &&
        isset($_POST["prenom"]) &&
        isset($_POST["mdp"]) &&
        isset($_POST["mdpC"])) {
        $bdd = new PDO("mysql:host=localhost;dbname=lom_gestion_cinema;charset=UTF8", "root", "");
        $req = $bdd->prepare("INSERT INTO user(nom,prenom,email,mdp,role) values(:nom,:prenom,:email,:mdp,:role) ");
        $req->execute(array(
            "nom" => $_POST["nom"],
            "prenom" => $_POST["prenom"],
            "email" => $_POST["email"],
            "mdp" => $_POST["mdp"],
            "role"=>"user"
        ));

        session_start();
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["mdp"] = $_POST["mdp"];
        $_SESSION["role"] = "user";
        $_SESSION["nom"] = $_POST["nom"];
        $_SESSION["prenom"] = $_POST["prenom"];
        $_SESSION["connexion"] = true;

        header("Location: index.html?connected=true");
    } else {
        echo("Les mots de passes ne correspondent pas");
    }

}

else{
    echo "les données sont incompletes ";
    echo "<form action='Inscription.php' method='get'>
          <button type='submit'> retour page inscription</button>
          </form>";


}



