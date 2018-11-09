<?php 
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];


function AuthGuard($qryUrl){

    if(isset($_SESSION) && count($_SESSION) > 0){
        if($_SESSION['id']){
            
        }else{
           //if($qryUrl){
           // var_dump($qryUrl, 'here');

           // header('Location: /controller/authentication.php?RQT_URL='+$qryUrl);
           //}else{
            header('Location: /controller/authentication.php');
           //}
            
        }

    }else{
        //if($qryUrl){
        //    var_dump($qryUrl, 'here');
        //header("'Location: /controller/authentication.php?RQT_URL='+$qryUrl");
        //}else{
            header('Location: /controller/authentication.php');
        //}
    }
}