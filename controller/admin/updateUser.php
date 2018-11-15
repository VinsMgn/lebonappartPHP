<?php

require_once("../../model/mainModel.php");
require_once("../../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];
session_start();
AuthGuard($RQT_URL);
//Obtention de l'utilisateur
$lintIdUser = $_SESSION['id'];
$lobjUser = GetUser($lintIdUser);

//Modification de l'utilisateur
if (isset($_POST) && count($_POST) > 0) {

    $lboolOk = UpdateUser($_POST['name'], $_POST['firstname'], $_POST['adress'], $_POST['phone'], $_POST['mail'], $_POST['country'], $_POST['solde'], $_POST['password'], $_POST['type'],$_POST['identifiant']);

    if($lboolOk = true){
        echo("La modification s'est bien déroulée");
    }else{
        echo("Echec de la modification");
    }

}

//Appel à la vue
require_once("../../view/updateUser.view.php");