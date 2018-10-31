<?php
require_once ("../model/mainModel.php");

//$lboolOk = DeleteUser();

$lintIdUser = 1;
$lobjUser = GetUser($lintIdUser);

if (isset($_POST) && count($_POST) > 0){
    $lboolOk = DeleteUser($_POST['identifiant']);
}

require_once ("../view/deleteUser.view.php");