<?php

$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require_once($INC_DIR."/controller/mainController.php");

//Display of 1 student
if ($lobjUser) {
    //Student object good
    echo("Nom : " . $lobjUser->nom);
    echo(" Prénom : " . $lobjUser->prenom);
    echo(" Adresse : " . $lobjUser->adress);
    echo(" Téléphone : " . $lobjUser->phone);
    echo(" Mail : " . $lobjUser->mail);
    echo(" Pays : " . $lobjUser->pays);
    echo(" Solde : " . $lobjUser->solde);
}