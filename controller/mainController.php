<?php

$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require_once($INC_DIR."/model/mainModel.php");

// BDD connexion
$bdd = GetDataBase();

//Display of 1 student
$lintIdUser = 1;
$lobjUser = GetUser($lintIdUser,$bdd);

