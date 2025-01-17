<?php
if($_POST['mdp']==$_POST['mdpC']) {
    if (
        isset($_POST['email']) &&
        isset($_POST['nom']) &&
        isset($_POST['prenom']) &&
        isset($_POST['mdp']) &&
        isset($_POST['mdpC'])) {
        $bdd = new PDO('mysql:host=localhost;dbname=lom_gestion_cinema;charset=UTF8', 'root', '');
        $req = $bdd->prepare("INSERT INTO user(nom,prenom,email,mdp) values(:nom,:prenom,:email,:mdp,) ");
        $req->execute(array(
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'mdp' => $_POST['mdp']
        ));
        echo "merci de vous etre inscrit";
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


