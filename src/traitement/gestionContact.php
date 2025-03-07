<?php
session_start();
require_once '../bdd/Bdd.php';
require_once '../modele/contact.php';
require_once"../repository/ContactRepository.php";

if(isset($_POST["idSaisieContact"])){
    $contactRepository = new ContactRepository();
    $contactRepository->deleteContact($_POST["idSaisieContact"]);
    header('Location: ../../vue/listeContacts.php?parametre=suppression');
}
elseif(empty($_POST['objet']) || empty($_POST['description'])){
    header('Location: ../../vue/contact.php?parametre=InfoManquante');
}
else{
    $contact = new Contact([
        'email' => $_SESSION['email'],
        'objet' => $_POST['objet'],
        'description' => $_POST['description'],
        'date' => date('Y-m-d')
    ]);
    $contactRepository = new ContactRepository();
    $contactRepository->envoyerMsg($contact);
    header('Location: ../../index.php?parametre=msgEnvoye');
}