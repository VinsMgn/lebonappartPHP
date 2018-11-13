<?php

require_once("../model/mainModel.php");
require_once("../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];
session_start();
AuthGuard($RQT_URL);

if(isset($_GET) && count($_GET)>0) {
    $idAppart = $_GET['id'];
    $lobjAppart = GetAppart($idAppart);
    var_dump($lobjAppart);
}