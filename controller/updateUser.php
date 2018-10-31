<?php
//Appel au modèle
require_once("../model/mainModel.php");

//Obtention de l'utilisateur
$lintIdUser = 2;
$lobjUser = GetUser($lintIdUser);

//Modification de l'utilisateur
if (isset($_POST) && count($_POST) > 0) {

    $lboolOk = UpdateUser($_POST['name'], $_POST['firstname'], $_POST['adress'], $_POST['phone'], $_POST['mail'], $_POST['country'], $_POST['solde'], $_POST['password'], $_POST['type'],$_POST['identifiant']);

    if($lboolOk = true){
        echo("La modification s'est bien déroulée");
        //Retour vers le profil actualisé (Header ou require de la vue ?)
    }else{
        echo("Echec de la modification");
        //Retour aux anciennes modifications + erreur
    }

}

//Appel à la vue
require_once("../view/updateUser.view.php");