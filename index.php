<?php 
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    require_once ("./helper/authGuard.php");
    session_start();
    AuthGuard('');
?>

<button><a href="/view/admin.php"> Vous êtes un administrateur </a></button>

<button><a href="/view/profil.php"> Voir mon profil </a></button>


<button><a href="/controller/authentication.php?disconnect"> Disconnect </a></button>