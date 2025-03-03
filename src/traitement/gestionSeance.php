<?php
require_once "../bdd/Bdd.php";
require_once "../modele/Seance.php";
require_once "../repository/SeanceRepository.php";
$idSeance = $_POST['idSaisie'];

var_dump($_POST);
if (isset($_POST['button'])){
    session_start();
    if($_POST['button']=='suppr'){
        $seance=new Seance([
                "idseance"=>$_POST['idSaisie']
            ]
        );
        $seanceRepo=new seanceRepository();
        $test = $seanceRepo->deleteSeance($seance);
        if($test){
            header("Location:../../vue/listeSeances.php?parametre=suppressionReussie");
        }
        else{
            header("Location:../../vue/listeSeances.php?parametre=erreur");
        }
    }
    elseif ($_POST['button']=='modifier'){
        $_SESSION['idseanceSelection']=$idSeance;
        header('Location: ../../vue/modifSeanceAdmin.php');
    }
    elseif ($_POST['button']=='nvseance'){
        $_SESSION['idSeanceSelection']=$idSeance;
        header('Location: ../../vue/nouvelleSeanceAdmin.php');
    }
    else{
        header('Location: ../../vue/listeSeances.php?parametre=erreur');
    }

}

?>
<!DOCTYPE html>
<html lang="fr">