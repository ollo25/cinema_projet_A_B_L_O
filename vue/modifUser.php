<?php
require_once "../src/bdd/Bdd.php";
require_once "../src/modele/User.php";
require_once "../src/repository/UserRepository.php";
$user=new UserRepository();
$modifUser=$user->modifUser();
?>
<!DOCTYPE html>
<html lang="fr">