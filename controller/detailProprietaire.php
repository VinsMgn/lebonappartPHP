<?php
require_once("../model/mainModel.php");

if (isset($_GET['id'])) {
    $lobjProprio = GetProprioByAppart($_GET['id']);
    $lobjAppart = GetAppartByUser($_GET['id']);
}

require_once("../view/detailProprietaire.view.php"); ?>