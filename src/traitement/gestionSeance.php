<?php
require_once "../bdd/Bdd.php";
require_once "../modele/Seance.php";
require_once "../repository/SeanceRepository.php";
$idSeance = $_POST['idSeanceSelection'];

var_dump($_POST);
if (isset($_POST['button'])){
    session_start();
    if($_POST['button']=='suppr'){
        $seance=new Seance([
                "idSeance"=>$_POST['idSeanceSelection']
            ]
        );
        $seanceRepo=new seanceRepository();
        $test = $seanceRepo->deleteSeance($seance);
        if($test){
            header("Location:../../vue/listeSeances.php?parametre=suppression");
        }
        else{
            header("Location:../../vue/listeSeances.php?parametre=erreur");
        }
    }
    elseif ($_POST['button']=='modifier'){
        $_SESSION['idSeanceSelection']=$idSeance;
        header('Location: ../../vue/modifSeanceAdmin.php');
    }
    elseif ($_POST['button']=='nvseance'){
        header('Location: ../../vue/nouvelleSeanceAdmin.php');
    }
    else{
        header('Location: ../../vue/listeSeances.php?parametre=erreur');
    }

}

?>
<!DOCTYPE html>
<html lang="fr">