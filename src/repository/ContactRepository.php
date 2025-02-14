<?php

class ContactRepository {
    public function envoyerMsg(Contact $contact) {
        $bdd=new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("INSERT INTO contact(email,objet,description) values(:email,:objet,:description) ");
        $req->execute(array(
            "email"=>$contact->getEmail(),
            "objet"=>$contact->getObjet(),
            "description"=>$contact->getDescription()
        ));
    }
    public function deleteContact(Contact $contact){
        $bdd = new Bdd();
        $database=$bdd->getBdd();
        $req = $database->prepare("DELETE FROM Contact WHERE id_contact = :id_contact");
        $req->execute(array(
            "id_contact"=>$contact->getIdContact()
        ));
        return $contact;
    }
}