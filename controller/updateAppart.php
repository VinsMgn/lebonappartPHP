<?php
require_once ("../model/mainModel.php");
require_once ("../helper/authGuard.php");
//$RQT_URL = $_SERVER['REQUEST_URI'];

session_start();

//AuthGuard($RQT_URL);

if (isset($_POST) && count($_POST)){
    //Remplir les paramètres avec la view
    $lboolOk = UpdateAppart();

    if($lboolOk == true){
        echo("La modification est effectuée");
    }else{
        echo("La modification ne s'est pas faite");
    }
}