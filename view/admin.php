<?php
    require_once ("../helper/authGuard.php");
    $RQT_URL = $_SERVER['REQUEST_URI'];
    session_start();
    AuthGuard($RQT_URL);
?>
<!--Partie pour les admins du site-->
<button><a href="/controller/insertUserAdmin.php"> Ajouter un utilisateur </a></button>
<button><a href="/controller/deleteUserAdmin.php"> Supprimer un utilisateur </a></button>
<button><a href="/controller/updateUserAdmin.php"> Mettre à jour les données d'un utilisateur </a></button>
<button><a href="/controller/listOfUsersAdmin.php"> Liste des utilisateurs </a></button>


<button><a href="/controller/listOfApparts.php"> Liste des appartements </a></button>
