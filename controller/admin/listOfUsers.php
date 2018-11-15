<?php
require_once("../../model/mainModel.php");
require_once("../../helper/authGuard.php");
$RQT_URL = $_SERVER['REQUEST_URI'];
session_start();
AuthGuard($RQT_URL);
$lobjUsers = GetUsers();

require_once("../../view/listsOfUsers.view.php");