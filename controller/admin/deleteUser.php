<?php

require_once("../../model/mainModel.php");
require_once("../../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];

session_start();

AuthGuard($RQT_URL);


$lintIdUser = $_SESSION['id'];
$lobjUser = GetUser($lintIdUser);

if (isset($_POST) && count($_POST) > 0){
    $lboolOk = DeleteUser($_POST['identifiant']);
}

require_once("../../view/deleteUser.view.php");