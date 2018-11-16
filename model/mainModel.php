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

//Authentification
function authenticate($lstrMail, $lstrPassword)
{
    $lobjUser = null;
    $bdd = GetDataBase();


    if ($bdd) {
        //Connexion done, request select
        $lstrQuery = "SELECT * FROM users WHERE mail = :pMail AND password = :pPassword";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pMail', $lstrMail);
        $stmt->bindParam(':pPassword', $lstrPassword);
        $stmt->execute();


        $lobjUser = $stmt->fetch(PDO::FETCH_OBJ);
    }
    return $lobjUser;

}

function GetCity($cp)
{
    $bdd = GetDataBase();
    $lobjCity = false;

    if ($bdd) {
        //Connexion ok, préparation de la requête
        $lstrQuery = "SELECT * FROM VILLES WHERE cpVille = :pCp ";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pCp', $cp);
        $stmt->execute();
        $lobjCity = $stmt->fetch(PDO::FETCH_OBJ);;
    }

    return $lobjCity;
}

function GetCities()
{
    $bdd = GetDataBase();
    $lobjCity = false;

    if ($bdd) {
        //Connexion ok, préparation de la requête
        $lstrQuery = "SELECT * FROM VILLES";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->execute();
        $lobjCity = $stmt->fetchAll(PDO::FETCH_OBJ);;
    }

    return $lobjCity;
}

function GetQuartierByCity($cp)
{
    $bdd = GetDataBase();
    $lobjQuart = false;

    if ($bdd) {
        //Connexion ok, préparation de la requête
        $lstrQuery = "SELECT * FROM QUARTIERS WHERE fk_ville_quartier = :pCp";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pCp', $cp);
        $stmt->execute();
        $lobjQuart = $stmt->fetch(PDO::FETCH_OBJ);;
    }

    return $lobjQuart;
}
//TODO
function GetVilles()
{

}

function GetQuartiers()
{
    $bdd = GetDataBase();
    $lobjQuart = false;

    if ($bdd) {
        //Connexion ok, préparation de la requête
        $lstrQuery = "SELECT * FROM QUARTIERS";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->execute();
        $lobjQuart = $stmt->fetchAll(PDO::FETCH_OBJ);;
    }

    return $lobjQuart;
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
function InsertUser($name, $firstname, $address, $phone, $mail, $pays, $solde, $password, $type, $isAdmin)
{
    $bdd = GetDataBase();
    $lboolOk = false;

    if ($bdd) {
        //Connexion ok, préparation de la requête
        $lstrQuery = "INSERT INTO users ( nom, prenom, adress, phone, mail, pays, solde, password, isProprietaire, isAdmin) VALUES ( :pNom, :pPrneom, :pAdress, :pPhone, :pMail, :pPays, :pSolde, :pPassword, :pType, :pIsAdmin)";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pNom', $name);
        $stmt->bindParam(':pPrneom', $firstname);
        $stmt->bindParam(':pAdress', $address);
        $stmt->bindParam(':pPhone', $phone);
        $stmt->bindParam(':pMail', $mail);
        $stmt->bindParam(':pPays', $pays);
        $stmt->bindParam(':pSolde', $solde);
        $stmt->bindParam(':pPassword', $password);
        $stmt->bindParam(':pType', $type);
        $stmt->bindParam(':pIsAdmin', $isAdmin);

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
        $lstrQuery = "UPDATE users SET nom=:pName, prenom=:pFirstname, adress=:pAddress, phone = :pPhone, mail = :pMail, pays = :pPays, solde = :pSolde, isAdmin = :pIsAdmin password = :pPassword, type = :pType WHERE id = :pId";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pName', $name);
        $stmt->bindParam(':pFirstname', $firstname);
        $stmt->bindParam(':pAddress', $address);
        $stmt->bindParam(':pPhone', $phone);
        $stmt->bindParam(':pMail', $mail);
        $stmt->bindParam(':pPays', $pays);
        $stmt->bindParam(':pSolde', $solde);
        $stmt->bindParam(':pPassword', $password);
        $stmt->bindParam(':pType', $type);
        $stmt->bindParam(':pId', $id);
        $stmt->bindParam(':pIsAdmin', $isAdmin);

        $stmt->execute();

        $lboolOk = true;
    }
    return $lboolOk;
}

//Affichage de tous les utilisateurs
function GetUsers()
{
    //Connexion à la base de données
    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "SELECT * FROM users";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->execute();

        $lobjUsers = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    return $lobjUsers;
}

//Suppression des utilisateurs
function DeleteUser($id)
{
    $lboolOk = false;
    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "DELETE FROM users WHERE id = :pId";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pId', $id);
        $stmt->execute();

        $lboolOk = true;
    }
    return $lboolOk;
}

//Affichage d'un appartement selon l'utilisateur connecté
function GetAppartByUser($idUser)
{
    $lobjAppart = null;

    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "SELECT * FROM appartements where FK_USERS = :pId";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pId', $idUser);
        $stmt->execute();

        $lobjAppart = $stmt->fetch(PDO::FETCH_OBJ);
    }

    return $lobjAppart;
}

//Affichage d'un appartement avec son id
function GetAppart($idAppart)
{
    $lobjAppart = null;

    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "SELECT * FROM appartements where id_appartement = :pId";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pId', $idAppart);
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
function AddAppart($prix, $description, $etat, $nbPiece, $surface, $meuble, $indEnergy, $creation, $expiration, $message, $statut, $idUser, $idQuartier, $idtown)
{
    $bdd = GetDataBase();
    $lboolOk = false;


    if ($bdd) {
        $lstrQuery = "INSERT INTO appartements (prix, description, etat, nbPiece, surface, meuble, ind_energie, dateCreation, dateExpiration, message, statut, FK_USERS, FK_QUARTIERS, FK_VILLES)
                    VALUES (:pPrix, :pDescription, :pEtat, :pNbPiece, :pSurface, :pMeuble, :pIndEnergy, :pCreation, :pExpiration, :pMessage, :pStatut, :pUsers, :pQuartier, :pTown)";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pPrix', $prix);
        $stmt->bindParam(':pDescription', $description);
        $stmt->bindParam(':pEtat', $etat);
        $stmt->bindParam(':pNbPiece', $nbPiece);
        $stmt->bindParam(':pSurface', $surface);
        $stmt->bindParam(':pMeuble', $meuble);
        $stmt->bindParam(':pIndEnergy', $indEnergy);
        $stmt->bindParam(':pCreation', $creation);
        $stmt->bindParam(':pExpiration', $expiration);
        $stmt->bindParam(':pMessage', $message);
        $stmt->bindParam(':pStatut', $statut);
        $stmt->bindParam(':pUsers', $idUser);
        $stmt->bindParam(':pQuartier', $idQuartier);
        $stmt->bindParam(':pTown', $idtown);
        $stmt->execute();

        $lboolOk = true;
    }
    return $lboolOk;
}

//Modification d'un appartement
function UpdateAppart($id, $prix, $description, $etat, $nbPiece, $surface, $meuble, $indEnergy, $creation, $expiration, $message, $statut)
{
    $lboolOk = false;

    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "UPDATE appartements SET prix = :pPrix, description = :pDescription, etat = :pEtat, nbPiece = :pNbPiece, surface = :pSurface, meuble = :pMeuble, ind_energie = :pIndEnergy, dateCreation = :pCreation, dateExpiration = :pExpiration, message = :pMessage, statut =:pStatut WHERE id_appartement = :pId";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pPrix', $prix);
        $stmt->bindParam(':pDescription', $description);
        $stmt->bindParam(':pEtat', $etat);
        $stmt->bindParam(':pNbPiece', $nbPiece);
        $stmt->bindParam(':pSurface', $surface);
        $stmt->bindParam(':pMeuble', $meuble);
        $stmt->bindParam(':pIndEnergy', $indEnergy);
        $stmt->bindParam(':pCreation', $creation);
        $stmt->bindParam(':pExpiration', $expiration);
        $stmt->bindParam(':pMessage', $message);
        $stmt->bindParam(':pStatut', $statut);
        $stmt->bindParam(':pId', $id);
        $stmt->execute();

        $lboolOk = true;
    }

    return $lboolOk;
}

function UpdateAppartAdmin($prix, $description, $etat, $nbPiece, $surface, $meuble, $indEnergy, $creation, $expiration, $message, $statut)
{
    $lboolOk = false;

    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "UPDATE appartements SET prix = :pPrix, description = :pDescription, etat = :pEtat, nbPiece = :pNbPiece, surface = :pSurface, meuble = :pMeuble, ind_energie = :pIndEnergy, dateCreation = :pCreation, dateExpiration = :pExpiration, message = :pMessage, statut =:pStatut";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pPrix', $prix);
        $stmt->bindParam(':pDescription', $description);
        $stmt->bindParam(':pEtat', $etat);
        $stmt->bindParam(':pNbPiece', $nbPiece);
        $stmt->bindParam(':pSurface', $surface);
        $stmt->bindParam(':pMeuble', $meuble);
        $stmt->bindParam(':pIndEnergy', $indEnergy);
        $stmt->bindParam(':pCreation', $creation);
        $stmt->bindParam(':pExpiration', $expiration);
        $stmt->bindParam(':pMessage', $message);
        $stmt->execute();

        $lboolOk = true;
    }

    return $lboolOk;
}

//Suppression d'un appartement
function DeleteAppart($id)
{
    $lboolOk = false;

    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "DELETE FROM appartements where id_appartement = :pId";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pId', $id);
        $stmt->execute();

        $lboolOk = true;
    }

    return $lboolOk;
}

//Fonction de recherche
function SearchCity($lstrSearch)
{
    $lobjAppart = null;

    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "Select * from VILLES WHERE cpVille LIKE :pSearch";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pSearch', $lstrSearch);
        $stmt->execute();

        $lobjAppart = $stmt->fetch(PDO::FETCH_OBJ);
    }
    return $lobjAppart;
}

//Afficher les appartements par ville
function GetAppartsByCity($city)
{

    $lobjAppartByCity = null;

    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "SELECT * FROM appartements where FK_VILLES = :pIdCity";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pIdCity', $city);
        $stmt->execute();

        $lobjAppartByCity = $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    return $lobjAppartByCity;
}

//Afficher le propriétaire d'un appartement
function GetProprioByAppart($idProprio)
{
    $lobjProprio = null;

    $bdd = GetDataBase();

    if ($bdd) {
        $lstrQuery = "SELECT users.id, users.nom, users.prenom, users.phone, users.mail FROM appartements, users WHERE appartements.FK_USERS = :pIdUser";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pIdUser',$idProprio);
        $stmt->execute();
        $lobjProprio = $stmt->fetch(PDO::FETCH_OBJ);
    }

    return $lobjProprio;
}

//Ajout du solde pour un utilisateur
function AddMoney($idUser, $montant){
    $lboolOk = false;

    $bdd = GetDataBase();

    if ($bdd){
        $lstrQuery = "UPDATE users SET solde = :pMontant WHERE id = :pIdUser";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pIdUser',$idUser);
        $stmt->bindParam(':pMontant',$montant);
        $stmt->execute();

        $lboolOk = true;
    }
    return $lboolOk;
}

//Retrait du solde pour un utilisateur
function RemoveMoney($idUser, $montant){
    $lboolOk = false;

    $bdd = GetDataBase();

    if ($bdd){
        $lstrQuery = "UPDATE users SET solde = :pMontant WHERE id = :pIdUser";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pIdUser',$idUser);
        $stmt->bindParam(':pMontant',$montant);
        $stmt->execute();

        $lboolOk = true;
    }
    return $lboolOk;
}

//Blocage de l'argent
function LockedMoney($idUser, $montant){
    $lboolOk = false;

    $bdd = GetDataBase();
    if($bdd){
        $lstrQuery = "UPDATE users SET lockedMoney = :pMontant WHERE id = :pId";
        $stmt = $bdd->prepare($lstrQuery);
        $stmt->bindParam(':pMontant',$montant);
        $stmt->bindParam(':pId',$idUser);
        $stmt->execute();

        $lboolOk = true;
    }
    return $lboolOk;
}
