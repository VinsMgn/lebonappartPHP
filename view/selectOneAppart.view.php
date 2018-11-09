<?php

require_once ("../controller/selectOneAppart.php");


if($lobjAppart){
    echo("Prix : ".$lobjAppart->prix."<br>");
    echo("Description : ".$lobjAppart->description."<br>");
    echo("Etat : ".$lobjAppart->etat."<br>");
    echo("Nombre de pièces : ".$lobjAppart->nbPiece."<br>");
    echo("Surface : ".$lobjAppart->surface."<br>");
    if ($lobjAppart->meuble == 0){
        echo("L'appartement n'est pas meublé"."<br>");
    }else{
        echo("L'appartement est meublé"."<br>");
    }
    echo("Indice énergie : ".$lobjAppart->ind_energie."<br>");
    echo("Date de création : ".$lobjAppart->dateCreation."<br>");
    echo("Date d'expiration : ".$lobjAppart->dateExpiration."<br>");
    echo("Message : ".$lobjAppart->message."<br>");
    if($lobjAppart->statut == 1){
        echo("L'appartement est déjà loué"."<br>");
    }else{
        echo ("L'appartement n'est pas loué"."<br>");
    }

}