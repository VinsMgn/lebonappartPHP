<?php
require_once ("../model/mainModel.php");
require_once ("../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];
session_start();
AuthGuard($RQT_URL);
if (isset($_POST) && count($_POST) > 0 ){
    //Insertion de l'utilisateur
    $lboolOk = AddAppart($_POST['id'], $_POST['prix'], $_POST['description'], $_POST['etat'], $_POST['nbPiece'], $_POST['surface'], $_POST['meuble'], $_POST['indEnergy'], $_POST['creation'], $_POST['expiration'], $_POST['message'], $_POST['statut'], $_POST['user'], $_POST['quartier'], $_POST['town']);

    if ($lboolOk == true){
        echo("L'ajout s'est bien déroulé");
    }else{
        echo("L'ajout n'a pas fonctionné");
    }
}

require_once ("../view/insertAppart.view.php");