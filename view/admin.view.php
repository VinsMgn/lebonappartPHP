<?php
    require_once ("../helper/authGuard.php");
    $RQT_URL = $_SERVER['REQUEST_URI'];
    session_start();
    AuthGuard($RQT_URL);
?>
<!--Partie pour les admins du site-->
<button><a href="../controller/admin/insertUserAdmin.php"> Ajouter un utilisateur </a></button>
<button><a href="../controller/admin/deleteUser.php"> Supprimer un utilisateur </a></button>
<button><a href="../controller/admin/updateUser.php"> Mettre à jour les données d'un utilisateur </a></button>
<button><a href="../controller/admin/listOfUsers.php"> Liste des utilisateurs </a></button>


<button><a href="../controller/listOfApparts.php"> Liste des appartements </a></button>
