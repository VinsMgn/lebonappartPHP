<?php 
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];


function AuthGuard($qryUrl){
    $auth = false;
    $isAdmin;


    if(isset($_SESSION) && count($_SESSION) > 0){
 
        if($_SESSION['id'] != null){
            
            $isAdmin = $_SESSION['isAdmin'];

            if(strpos($qryUrl,'admin') ){
                if($isAdmin == '1'){
                    $auth = true;
                  
                }else{
                    $auth = true;
                    header('Location: /welcome.php?error=2');   
                  
                }
                
            }else{
                $auth = true;
            }
        }else{
            header('Location: /index.php');
        }

    }else{
        // header('Location: /index.php');
    }

}