<?php
require_once ("../model/mainModel.php");
require_once ("../helper/authGuard.php");
//$RQT_URL = $_SERVER['REQUEST_URI'];

session_start();

//AuthGuard($RQT_URL);

//Selection de l'appartement selon l'utilisateur connecté
$lobjUser = GetUser($_SESSION['id']);
$lobjAppart = GetAppartByUser($lobjUser->id);


if (isset($_POST) && count($_POST)){

    //Remplir les paramètres avec la view
    $lboolOk = UpdateAppart($_SESSION['id'], $_POST['prix'], $_POST['description'], $_POST['etat'], $_POST['nbPiece'], $_POST['surface'],$_POST['meuble'], $_POST['ind_energie'], $_POST['creation'], $_POST['expiration'], $_POST['message'], $_POST['statut']);

    if($lboolOk == true){
        echo("La modification est effectuée");
    }else{
        echo("La modification ne s'est pas faite");
    }
}

require_once ("../view/updateAppart.view.php");