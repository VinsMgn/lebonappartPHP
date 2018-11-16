<?php
require_once ("../model/mainModel.php");

require_once ("../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];
session_start();
AuthGuard($RQT_URL);
if(isset($_POST) && count($_POST) > 0){
    //Insertion de l'utilisateur
    if($_POST['type'] == "oui"){
        $type = 1;
    }else{
        $type = 0;
    }
    $lboolOk = InsertUser( $_POST['name'],$_POST['firstname'],$_POST['adress'], $_POST['phone'], $_POST['mail'],$_POST['country'],$_POST['solde'],$_POST['password'],$type, 0);


    if ($lboolOk == true){
        //l'inscription s'est bien passée
        header('Location: authentication.php');
    }else{
        //Erreur à l'inscription
        echo("Echec de l'inscription");
        header('Location: ../controller/insertAppart.php');

    }
}




require_once ("../view/insertUser.view.php");