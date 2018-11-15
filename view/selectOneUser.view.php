<?php

//$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
//require_once($INC_DIR . "/controller/selectOneUser.view.php");

//Ne marche qu'en chemin absolu, a voir pour le chemin relatif plus tard
require_once("../controller/selectOneUser.php");

//Display of 1 student
if ($lobjUser) {
    //Student object good
    echo("Nom : " . $lobjUser->nom . "<br>");
    echo(" Prénom : " . $lobjUser->prenom . "<br>");
    echo(" Adresse : " . $lobjUser->adress . "<br>");
    echo(" Téléphone : " . $lobjUser->phone . "<br>");
    echo(" Mail : " . $lobjUser->mail . "<br>");
    echo(" Pays : " . $lobjUser->pays . "<br>");
    echo("Solde : " . $lobjUser->solde . "<br>");
    echo("Type : " . $lobjUser->type . "<br>");
    echo(" Mot de passe : " . $lobjUser->password . "<br>");
}?>
<button> <a href="../controller/admin/updateUser.php" style="text-decoration: none">Modifier les informations</button>
