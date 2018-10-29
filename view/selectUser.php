<?php

$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
//require_once($INC_DIR . "/controller/select_User.php");
require_once("../controller/select_User.php");

//Display of 1 student
if ($lobjUser) {
    //Student object good
    echo("Nom : " . $lobjUser->nom."<br>");
    echo(" Prénom : " . $lobjUser->prenom."<br>");
    echo(" Adresse : " . $lobjUser->adress."<br>");
    echo(" Téléphone : " . $lobjUser->phone."<br>");
    echo(" Mail : " . $lobjUser->mail."<br>");
    echo(" Pays : " . $lobjUser->pays."<br>");
    echo(" Solde : " . $lobjUser->solde."<br>");
}