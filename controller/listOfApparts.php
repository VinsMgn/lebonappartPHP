<?php
require_once ("../model/mainModel.php");
require_once ("../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];
session_start();
AuthGuard($RQT_URL);
//Fonction qui liste tous les appartements

$lobjApparts = GetApparts();
require_once ("../view/listOfApparts.view.php");