<?php

//Connexion BDD
function GetDataBase()
{

    /**
     * BDD Connexion
     */
    $host = "localhost";
    $dbName = "lebonappart";
    $login = "root";
    $password = "";

    try {
        $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        $bdd = null;
        die('Erreur : ' . $e->getMessage());
    }

    return $bdd;
}

//Selection d'un utilisateur
function GetUser($lIdUser, PDO $bdd = null)
{
    $lobjUser = null;

    //BDD connexion
    if ($bdd = null) {
        $bdd = GetDataBase();
    }

    if ($bdd) {
        //Connexion done, request select
        $lstrQuery = "SELECT * FROM user WHERE id = :pid";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pid', $lIdUser);
        $stmt->execute();

        $lobjUser = $stmt->fetch(PDO::FETCH_OBJ);
    }
    return $lobjUser;
}