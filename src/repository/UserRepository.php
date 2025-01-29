<?php
class UserRepository
{
    public function inscription($user){
     // $sql = "req"
        //prepare
        //execute -> $user


    }
    public function connexion(User $user){


        $req = $bdd->prepare('SELECT * FROM user WHERE email = :email AND mdp = :mdp');
        $req->execute(array(
            'email' => $user->getEmail(),
            'mdp' => $user->getMdp()
        ));
        $utilisateur = $req->fetch();
        if($utilisateur){
            $user->setNom($user);
        }
        return $user;
    }
    public function inscription(User $user){

    }
}