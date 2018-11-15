<?php
require_once ("../model/mainModel.php");
require_once ("../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];
session_start();
AuthGuard($RQT_URL);
$QRY_STR = $_SERVER['QUERY_STRING'];
//Fonction qui liste tous les appartements
$lobjApparts = GetApparts();
if($QRY_STR == 'error=3'){
    echo('Vous avez déjà un appartement, veuillez le supprimer ');
}
require_once ("../view/listOfAppartsUser.view.php");