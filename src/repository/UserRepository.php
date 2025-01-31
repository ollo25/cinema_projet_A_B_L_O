<?php
require_once"../bdd/Bdd.php";
class UserRepository{
    public function connexion(User $user){
        $bdd=new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare('SELECT * FROM user WHERE email = :email AND mdp = :mdp');
        $req->execute(array(
            'email' => $user->getEmail(),
            'mdp' => $user->getMdp()
        ));
        $utilisateur = $req->fetch();
        if($utilisateur){
            $user->setNom($utilisateur["nom"]);
            $user->setRole($utilisateur["role"]);
            $user->setIdUser($utilisateur["id_user"]);
            $user->setPrenom($utilisateur["prenom"]);
        }
        return $user;
    }
    public function inscription(User $user){
        $bdd=new Bdd;
        $database=$bdd->getBdd();
        $req = $database->prepare("INSERT INTO user(nom,prenom,email,mdp,role) values(:nom,:prenom,:email,:mdp,:role) ");
        $req->execute(array(
            "nom" => $_POST["nom"],
            "prenom" => $_POST["prenom"],
            "email" => $_POST["email"],
            "mdp" => $_POST["mdp"],
            "role"=>"user"
        ));
        return $user;
    }
}