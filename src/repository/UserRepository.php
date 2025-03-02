<?php
class UserRepository{
    public function connexion(User $user){
        $bdd=new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare('SELECT * FROM user WHERE email = :email');
        $req->execute(array(
            'email' => $user->getEmail()
        ));
        $utilisateur = $req->fetch();
        if($utilisateur){
            $user->setMdp($utilisateur['mdp']);
            $user->setNom($utilisateur["nom"]);
            $user->setRole($utilisateur["role"]);
            $user->setIdUser($utilisateur["id_user"]);
            $user->setPrenom($utilisateur["prenom"]);
        }
        return $user;
    }
    public function inscription(User $user){
        $bdd=new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("INSERT INTO user(nom,prenom,email,mdp,role) values(:nom,:prenom,:email,:mdp,:role) ");
        $req->execute(array(
            "nom" => $user->getNom(),
            "prenom" => $user->getPrenom(),
            "email" => $user->getEmail(),
            "mdp" => $user->getMdp(),
            "role" => $user->getRole()
        ));
        return $user;
    }
    public function nombreUtilisateur(){
        $bdd = new Bdd();
        $database = $bdd->getBdd();
        $req = $database->prepare('SELECT COUNT(id_user) FROM user');
        $req->execute();
        $result = $req->fetch();
        return $result[0];
    }
    public function listeUser(){
        $listeUser = [];
        $bdd = new Bdd();
        $datebase = $bdd ->getBdd();
        $req = $datebase->prepare('SELECT * FROM user');
        $req->execute();
        $listeUsersBdd = $req->fetchAll();
        foreach($listeUsersBdd as $listeUserBdd){
            $listeUser[] = new User([
                'idUser' => $listeUserBdd['id_user'],
                'nom' => $listeUserBdd['nom'],
                'prenom' => $listeUserBdd['prenom'],
                'email' => $listeUserBdd['email'],
                'mdp' => $listeUserBdd['mdp'],
                'role' => $listeUserBdd['role'],
            ]);
        }
        return $listeUser;
    }
    public function modifUser(User $user){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("UPDATE user SET role = :role WHERE id_user = :id_user");
        $req->execute(array(
            "role"=>$user->getRole(),
            "id_user"=> $user->getIdUser()
        ));
        return $user;
    }
    public function deleteUser(User $user){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM user WHERE id_user = :id_user");
        $req->execute(array(
            "id_user"=>$user->getIdUser()
        ));
        return $user;
    }
}