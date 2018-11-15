<?php 
    // $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    // $RQT_URL = $_SERVER['REQUEST_URI'];

    // require_once ("./helper/authGuard.php");

    // session_start();
    // AuthGuard($RQT_URL);

    // $QRY_STR = $_SERVER['QUERY_STRING'];

    // if($QRY_STR == 'error=2'){
    //     echo("Vous n'êtes pas administrateur ! ");
    // }
   
    // if(isset($_SESSION)){
    //     if($_SESSION['isAdmin'] == '1'){
?>
            <!-- <button><a href="/view/admin.php"> Vous êtes un administrateur </a></button> -->
<?php
        // }
    // }

?>



<!-- <button><a href="/view/profil.php"> Voir mon profil </a></button> -->


<!-- <button><a href="/index.php?disconnect"> Disconnect </a></button> -->

<?php
 $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
 $RQT_URL = $_SERVER['REQUEST_URI'];

 require_once ("./helper/authGuard.php");

 session_start();
 AuthGuard($RQT_URL);

 $QRY_STR = $_SERVER['QUERY_STRING'];

 if($QRY_STR == 'error=2'){
     echo("Vous n'êtes pas administrateur ! ");
 }
 include('./helper/header.php')
?>
    <div id="mainContainer" class="container">
        <?php
        include("./helper/navbar.html");

        ?>

        <div id="contentContainer" class="scrollable">

            <div class="profileContainer">
                <div class="user">
                    <img class="pp" src="../assets/img/yv.png">
                    <h3 class="ellipsis">
                        <?php //echo($_SESSION["user"][3]);
                        echo('Robert'); ?>
                    </h3>
                </div>

                <div class="itemsWrapper">

                    <div class="userInfos">
                        <span class="title">Informations</span>
                        <ul>
                            <li>
                                <span class="typeInfo">Pseudo : </span>
                                <?php  echo('Robert'); ?>
                            </li>
                            <li>
                                <span class="typeInfo">Nom complet : </span>
                                <?php  echo('Robert'); ?>
                            </li>
                            <li>
                                <span class="typeInfo">Ecole : </span>
                                <?php
                                // $lobjStudent = GetStudent($_SESSION["user"][2]);
                                // $idSchool = $lobjStudent->idSchool;
                                // $lobjSchool = getSchool(null, $idSchool);
                                // echo($lobjSchool->address); ?>
                            </li>
                            <li>
                                <!-- <span class="typeInfo">Téléphone : </span> -->
                                <!-- <?php //echo($_SESSION["user"][6]); ?> -->
                            </li>
                            <li>
                                <!-- <span class="typeInfo">Adresse mail : </span> -->
                                <?php// echo($_SESSION["user"][1]); ?>
                            </li>
                        </ul>
                    </div>

                    <div class="userAds">
                        <span class="title">Mes annonces de logement</span>
                        <ul>
                            <?php

                          //  $lobjAdHouse = getAdHousesByStudent(null,$_SESSION["user"][2]);
                            //foreach ($lobjAdHouse as $adHouse){?>
                            <li>
                                <a href="../controller/insertAppart.php">
                                    <?php
                                    //echo($adHouse->title);
                                    //} ?>
                                </a>
                            </li>


                        </ul>
                    </div>

                    <div class="userAds">
                        <span class="title">Mes annonces de bon plan</span>
                        <ul>
                            <?php

                            //$lobjAdTips = getTipsByStudent(null,$_SESSION["user"][2]);
                           // foreach ($lobjAdTips as $tips){?>
                            <li>
                                <a href="../controler/edit_ad_tips.controller.php">
                                    <?php
                                   // echo($tips->title);
                                    //} ?>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

<!--                <button class="btn submit waves-effect waves-light" type="submit" name="submit">-->
                    <a href="./controller/insertAppart.php" class="btn submit waves-effect waves-light">Ajouter un logement
                        <i class="material-icons right">add_circle</i>
                    </a>

<!--                </button>-->
            </div>

        </div>


    </div>

<?php
include("../helper/footer.php");
?>