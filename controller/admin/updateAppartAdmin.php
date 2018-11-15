<?php
require_once ("../../model/mainModel.php");
require_once ("../");
//$RQT_URL = $_SERVER['REQUEST_URI'];

session_start();

//AuthGuard($RQT_URL);

//Selection de l'appartement selon l'utilisateur connecté
$lobjUser = GetUser($_SESSION['id']);
$lobjAppart = GetAppartByUser($lobjUser->id);


if (isset($_POST) && count($_POST)){
    if($_POST['meuble'] == "oui"){
        $meuble = 1;
    }else{
        $meuble = 0;
    }

    if($_POST['statut'] == "occupe"){
        $statut = 1;
    }else{
        $statut = 0;
    }

    //Remplir les paramètres avec la view
    $lboolOk = UpdateAppartAdmin( $_POST['prix'], $_POST['description'], $_POST['etat'], $_POST['nbPiece'], $_POST['surface'],$meuble, $_POST['ind_energie'], $_POST['creation'], $_POST['expiration'], $_POST['message'], $statut);

    if($lboolOk == true){
        echo("La modification est effectuée");
    }else{
        echo("La modification ne s'est pas faite");
    }
}

require_once ("../../view/updateAppart.view.php");