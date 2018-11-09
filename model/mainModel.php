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
function authenticate($lstrMail,$lstrPassword){
    $lobjUser = null;
    $bdd = GetDataBase();


    if ($bdd) {
        //Connexion done, request select
        $lstrQuery = "SELECT * FROM users WHERE mail = :pMail AND password = :pPassword" ;
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pMail', $lstrMail);
        $stmt->bindParam(':pPassword', $lstrPassword);
        $stmt->execute();


        $lobjUser = $stmt->fetch(PDO::FETCH_OBJ);
    }
        return $lobjUser;

   
}

//Affichage d'un utilisateur
function GetUser($lIdUser)
{
    $lobjUser = null;
    $bdd = GetDataBase();


    if ($bdd) {
        //Connexion done, request select
        $lstrQuery = "SELECT * FROM users WHERE id = :pid";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pid', $lIdUser);
        $stmt->execute();


        $lobjUser = $stmt->fetch(PDO::FETCH_OBJ);
    }
    return $lobjUser;
}

//Insertion d'un utilisateur
function InsertUser($id, $name, $firstname, $address, $phone, $mail, $pays, $solde, $password, $type)
{
    $bdd = GetDataBase();
    $lboolOk = false;

    if ($bdd) {
        //Connexion ok, préparation de la requête
        $lstrQuery = "INSERT INTO users (id, nom, prenom, adress, phone, mail, pays, solde, password, type) VALUES (:pId, :pNom, :pPrneom, :pAdress, :pPhone, :pMail, :pPays, :pSolde, :pPassword, :pType)";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pId', $id);
        $stmt->bindParam(':pNom', $name);
        $stmt->bindParam(':pPrneom', $firstname);
        $stmt->bindParam(':pAdress', $address);
        $stmt->bindParam(':pPhone', $phone);
        $stmt->bindParam(':pMail', $mail);
        $stmt->bindParam(':pPays', $pays);
        $stmt->bindParam(':pSolde', $solde);
        $stmt->bindParam(':pPassword', $password);
        $stmt->bindParam(':pType', $type);

        $stmt->execute();
        $lboolOk = true;
    }
    return $lboolOk;
}

//Modification d'un utilisateur
function UpdateUser($name, $firstname, $address, $phone, $mail, $pays, $solde, $password, $type, $id)
{
    $lboolOk = false;

    //Connexion à la base de données
    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "UPDATE users SET nom=:pName, prenom=:pFirstname, adress=:pAddress, phone = :pPhone, mail = :pMail, pays = :pPays, solde = :pSolde, password = :pPassword, type = :pType WHERE id = :pId";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pName',$name);
        $stmt->bindParam(':pFirstname',$firstname);
        $stmt->bindParam(':pAddress',$address);
        $stmt->bindParam(':pPhone',$phone);
        $stmt->bindParam(':pMail',$mail);
        $stmt->bindParam(':pPays',$pays);
        $stmt->bindParam(':pSolde',$solde);
        $stmt->bindParam(':pPassword',$password);
        $stmt->bindParam(':pType',$type);
        $stmt->bindParam(':pId',$id);

        $stmt->execute();

        $lboolOk=true;
    }
    return $lboolOk;
}

//Affichage de tous les utilisateurs
function GetUsers(){
    //Connexion à la base de données
    $bdd = GetDataBase();

    if($bdd){
        $lstrQuery = "SELECT * FROM users";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->execute();

        $lobjUsers = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    return $lobjUsers;
}

//Suppression des utilisateurs
function DeleteUser($id){
    $lboolOk = false;
    $bdd = GetDataBase();

    if($bdd){
        $lstrQuery = "DELETE FROM users WHERE id = :pId";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pId',$id);
        $stmt->execute();

        $lboolOk = true;
    }
    return $lboolOk;
}
//Fonctions CRUD appartement (Vincent)

//Affichage d'un appartement
function GetAppart($lidAppart)
{
    $lobjAppart = null;

    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "SELECT * FROM appartements where id_appartement = :pId";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pId', $lidAppart);
        $stmt->execute();

        $lobjAppart = $stmt->fetch(PDO::FETCH_OBJ);
    }

    return $lobjAppart;
}

//Affichage de tous les appartements
function GetApparts()
{
    //Connexion à la base de données
    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "SELECT * FROM appartements";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->execute();

        $lobjApparts = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    return $lobjApparts;
}

//Ajout d'un logement
function AddAppart($id, $prix, $description, $etat, $nbPiece, $surface, $meuble, $indEnergy, $creation, $expiration, $message, $statut, $idUser, $idQuartier, $idtown)
{
    $bdd = GetDataBase();
    $lboolOk = false;


    if($bdd){
        $lstrQuery = "INSERT INTO appartements (id_appartement, prix, description, etat, nbPiece, surface, meuble, ind_energie, dateCreation, dateExpiration, message, statut, FK_USERS, FK_QUARTIERS, FK_VILLES)
                    VALUES (:pId, :pPrix, :pDescription, :pEtat, :pNbPiece, :pSurface, :pMeuble, :pIndEnergy, :pCreation, :pExpiration, :pMessage, :pStatut, :pUsers, :pQuartier, :pTown)";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pId',$id);
        $stmt->bindParam(':pPrix',$prix);
        $stmt->bindParam(':pDescription',$description);
        $stmt->bindParam(':pEtat',$etat);
        $stmt->bindParam(':pNbPiece',$nbPiece);
        $stmt->bindParam(':pSurface',$surface);
        $stmt->bindParam(':pMeuble',$meuble);
        $stmt->bindParam(':pIndEnergy',$indEnergy);
        $stmt->bindParam(':pCreation',$creation);
        $stmt->bindParam(':pExpiration',$expiration);
        $stmt->bindParam(':pMessage',$message);
        $stmt->bindParam(':pStatut',$statut);
        $stmt->bindParam(':pUsers',$idUser);
        $stmt->bindParam(':pQuartier',$idQuartier);
        $stmt->bindParam(':pTown',$idtown);
        $stmt->execute();

        $lboolOk = true;
    }
    return $lboolOk;
}

//Fin fonctions CRUD appartement (Vincent)