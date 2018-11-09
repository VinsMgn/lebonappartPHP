<?php

$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
//require_once($INC_DIR."/model/mainModel.php");
require_once("../model/mainModel.php");
require_once ("../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];
session_start();
AuthGuard($RQT_URL);
// BDD connexion
$bdd = GetDataBase();

//Affichage d'un utilisateur
$lintIdUser = 1;
$lobjUser = GetUser($lintIdUser);

//require_once($INC_DIR . "/view/selectOneUser.view.php");
require_once("../view/selectOneUser.view.php");