<?php
require_once ("../model/mainModel.php");
require_once ("../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];

session_start();

AuthGuard($RQT_URL);


//Sélection de l'appartement de l'utilisateur connecté
$lobjAppart = GetAppartByUser($_SESSION['id']);

if (isset($_POST) && count($_POST)){
    //Envoi du formulaire OK, on supprime l'appartement
    $lboolOK = DeleteAppart($lobjAppart->id_appartement);
    header('Location:../view/profil.php');
}

require_once ("../view/deleteAppart.view.php");