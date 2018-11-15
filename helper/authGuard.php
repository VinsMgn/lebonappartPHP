<?php 
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];


function AuthGuard($qryUrl){
    $auth = false;
    $isAdmin;
    
//var_dump($_SESSION);

    if(isset($_SESSION) && count($_SESSION) > 0){
//        var_dump($qryUrl);
        if($_SESSION['id'] ){
            
            $isAdmin = $_SESSION['isAdmin'];

            if(strpos($qryUrl,'admin') ){
                if($isAdmin == '1'){
                    $auth = true;
//                    var_dump('here');
                }else{
                    $auth = true;
                    header('Location: /index.php?error=2');   
//                    var_dump('here it');
                }
                
            }else{
                $auth = true;
            }
        }else{
            header('Location: /controller/authentication.php');
        }

    }else{
        header('Location: /controller/authentication.php');
    }

}