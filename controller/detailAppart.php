<?php

require_once("../model/mainModel.php");
require_once("../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];
session_start();
AuthGuard($RQT_URL);

if(isset($_GET) && count($_GET)>0) {
    $idAppart = $_GET['id'];
    $lobjAppart = GetAppart($idAppart);
    $lobjUser = GetUser($lobjAppart->FK_USERS);
    $lobjCity = GetCity($lobjAppart->FK_VILLES);
    $lobjQuartier = GetQuartierByCity($lobjCity->cpVille);
}

require_once("../view/detailAppart.view.php");