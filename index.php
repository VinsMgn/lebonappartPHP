<?php 
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    require_once ("./helper/authGuard.php");
    session_start();
    AuthGuard('');
?>
<button><a href="/controller/insertUser.php"> Insert a User </a></button>
<button><a href="/controller/deleteUser.php"> Delete a User </a></button>
<button><a href="/controller/updateUser.php"> Update a User </a></button>
<button><a href="/controller/listOfUsers.php"> List of Users </a></button>

<button><a href="/controller/insertAppart.php"> Insert un logement</a></button>
<button><a href="/controller/listOfApparts.php"> List of Appartements </a></button>


<button><a href="/controller/authentication.php?disconnect"> Disconnect </a></button>