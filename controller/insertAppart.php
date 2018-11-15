<?php
require_once ("../model/mainModel.php");
require_once ("../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];

session_start();
require_once ("../view/insertAppart.view.php");

AuthGuard($RQT_URL);


if (isset($_POST) && count($_POST) > 0){
    $quartier = GetQuartierByCity($_POST['town'], $_POST['quartier']);
    $lboolOk = AddAppart( $_POST['prix'], $_POST['description'], $_POST['etat'], $_POST['nbPiece'], $_POST['surface'], $_POST['meuble'], $_POST['indEnergy'], $_POST['creation'], $_POST['expiration'], $_POST['message'], $_POST['statut'], $_SESSION['id'],$quartier->id_quartier , $_POST['town']);

    if ($lboolOk == true){
        echo("L'ajout s'est bien déroulé");
    }else{
        echo("L'ajout n'a pas fonctionné");
    }
}

require_once ("../view/insertAppart.view.php");
