<?php
require_once("../model/mainModel.php");

session_start();

//
////Propriétaire de l'appartement
//$lobjProprio = GetProprioByAppart($_GET['id']);
////Obtention de l'appartement pour obtenir son prix
//$lobjAppart = GetAppartByUser($_GET['id']);
////Obtention des informations du mec connecté
//$lobjUserConnected = GetUser($_SESSION['id']);

if (isset($_GET['id'])) {
    //Propriétaire de l'appartement
    $lobjProprio = GetProprioByAppart($_GET['id']);
    //Obtention de l'appartement pour obtenir son prix
    $lobjAppart = GetAppartByUser($_GET['id']);
    //Obtention des informations du mec connecté
    $lobjUserConnected = GetUser($_SESSION['id']);
    if (isset($_GET['OK'])) {
        if($lobjProprio->id == $_SESSION['id']){
            echo("Bien tenté mais vous ne pouvez pas être locataire de votre propre appartement");
        }else{
            if ($lobjUserConnected->solde < $lobjAppart->prix) {
                echo("Vous n'avez pas assez de jetons sur votre solde pour pouvoir effectuer cette demande");
            } else {
                //Retrait du solde du mec connecté du prix en jeton
                $montant = -intval($lobjAppart->prix);
                $nouveauSolde = (intval($lobjUserConnected->solde)) + $montant;
                $lboolOk = RemoveMoney($_SESSION['id'], $nouveauSolde);
                if ($lboolOk == true) {
                    echo("La transaction a été effectuée. N'hésitez pas à contacter le propriétaire.");
                    $Ok = LockedMoney($lobjProprio->id, $nouveauSolde);
                } else {
                    echo("Impossible d'effectuer la transaction. Veuillez contacter l'administrateur pour plus d'informations.");
                }
            }
        }


    }

}

require_once("../view/detailProprietaire.view.php"); ?>