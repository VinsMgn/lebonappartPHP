<?php
require_once("../model/mainModel.php");

if (isset($_GET['id'])) {
    //Propriétaire de l'appartement
    $lobjProprio = GetProprioByAppart($_GET['id']);
    //Obtention de l'appartement pour obtenir son prix
    $lobjAppart = GetAppartByUser($_GET['id']);
}

require_once("../view/detailProprietaire.view.php"); ?>