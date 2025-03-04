<?php
require_once "../bdd/Bdd.php";
require_once "../modele/Salle.php";
require_once "../repository/SalleRepository.php";
$idSalle = $_POST['idSalleSelection'];

if (isset($_POST['button'])){
    session_start();
    if($_POST['button']=='suppr'){
        $salle=new Salle([
                "idSalle"=>$_POST['idSalleSelection'],
            ]
        );
        $salleRepo=new SalleRepository();
        $test = $salleRepo->deleteSalle($salle);
        if($test){
            header("Location:../../vue/listeSalles.php?parametre=suppression");
        }
        else{
            header("Location:../../vue/listeSalle.php?parametre=erreur");
        }
    }
    elseif ($_POST['button']=='modifier'){
        $_SESSION['idSalleSelection']=$idSalle;
        header('Location: ../../vue/modifSalleAdmin.php');
    }
    elseif ($_POST['button']=='nvSalle'){
        $_SESSION['idSalleSelection']=$idSalle;
        header('Location: ../../vue/nouveauSalleAdmin.php');
    }
    else{
        header('Location: ../../vue/listeSalles.php?parametre=erreur');
    }

}

?>
