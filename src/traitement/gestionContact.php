<?php
session_start();
require_once '../modele/contact.php';
require_once"../repository/ContactRepository.php";
if(empty($_POST['objet']) || empty($_POST['description'])){
    header('Location: ../../vue/contact.php?parametre=InfoManquante');
}
else{
    $contact = new Contact([
        'email' => $_SESSION['email'],
        'objet' => $_POST['objet'],
        'description' => $_POST['description'],
    ]);
    $contactRepository = new ContactRepository();
    $contactRepository->envoyerMsg($contact);
    header('Location: ../../vue/contact.php?parametre=msgEnvoye');
}