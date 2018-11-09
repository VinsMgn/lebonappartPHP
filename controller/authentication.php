<?php
require_once ("../model/mainModel.php");
require_once ("../view/authentication.view.php");


$CUR_DIR = $_SERVER['REQUEST_URI'];
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
$QRY_STR = $_SERVER['QUERY_STRING'];

session_start();

//Traitement si l'utilisateur souhaite se déconnecter
if($QRY_STR == 'disconnect'){
    session_destroy();
}

// Traitement si l'utilisateur est déjà connecté;
if(isset($_SESSION) && count($_SESSION) > 0 ){
    if($_SESSION['id']){
        header('Location: ../index.php');
    }
  
}
//Traitement en cas de mauvais mail/mdp
if($QRY_STR == 'error=1'){
    echo("Mauvais mot de passe ou mauvais mail ");
}


//Récupère les données posts
if (isset($_POST) && count($_POST) > 0){
  
    $mail =$_POST['mail'];
    $password =$_POST['password'];

    //Requête de BDD pour récupérer l'utilisateur
    $user = authenticate($mail,$password);
    // Vérifie si l'utilisateur est enregistré
    if($user  == null){
        // On ne trouve pas l'utilisateur, il retourne à la page de login avec une erreur que l'on traite plus haut
        header('Location: ../controller/authentication.php?error=1');
    }else{
        // On trouve l'utilisateur, on stocke son id dans la variable session et on le redirige sur l'accueil
        $_SESSION['id'] = $user->id;
        var_dump($_SESSION['id']);
        if( strpos($QRY_STR, 'RQT_URL')){
            $url = substr($QRY_STR,'RQT_URL=');
            header('Location: ..'+$QRY_STR);
        }else{
            header('Location: ../index.php');
        }
    
    }
}

require_once ("../view/authentication.view.php");