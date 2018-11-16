<?php
 include('./helper/header.php');
 require_once("./helper/authGuard.php");
 session_start();

 if(isset($_SESSION)){
    if($_SESSION['id']){
       header('Location: /welcome.php');
    }
}
 
 $QRY_STR = $_SERVER['QUERY_STRING'];
 
//Traitement si l'utilisateur souhaite se déconnecter
if($QRY_STR == 'disconnect') {
    session_destroy();
}

if($QRY_STR == 'error=2'){
    echo("Vous n'êtes pas administrateur ! ");
}

?>

<div id="mainContainer" class="container welcome">

    <div id="contentContainer">

        <div class="welcomeContainer">
            <div class="welcomeHead">
                <img class="img" src="/assets/img/logo.png">
                <h3 class="ellipsis">
                    Bienvenue sur LeBonappart!
                </h3>
            </div>
    
            <div class="itemsWrapper">
    
                <a href="./controller/authentication.php">
                    <div class="welcomeButton">
                        <span class="title">Se connecter</span>
                    </div>
                </a>

                <a href="./controller/insertUser.php">
                    <div class="welcomeButton">
                        <span class="title">S'inscrire</span>
                    </div>
                </a>
    
            </div>      
        </div>

    </div>

    
</div>

<?php
include("./helper/footer.php");
?>
