<?php 
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    require_once ("./helper/authGuard.php");
    session_start();
    AuthGuard('');

    $QRY_STR = $_SERVER['QUERY_STRING'];

    if($QRY_STR == 'error=2'){
        echo("Vous n'êtes pas administrateur ! ");
    }
//    var_dump($_SESSION)
?>

<button><a href="/view/admin.php"> Vous êtes un administrateur </a></button>

<button><a href="/view/profil.php"> Voir mon profil </a></button>


<button><a href="/controller/authentication.php?disconnect"> Disconnect </a></button>