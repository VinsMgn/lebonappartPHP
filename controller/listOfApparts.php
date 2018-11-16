<?php
require_once("../model/mainModel.php");
require_once("../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];
session_start();
AuthGuard($RQT_URL);

$lobjVilles = GetCities();
if (isset($_POST) && count($_POST) > 0) {
    $search = SearchCity($_POST['city']);
    $lobjApparts = GetAppartsByCity($search->cpVille);
} else {
    $lobjApparts = GetApparts();
}

require_once("../view/listOfApparts.view.php");
