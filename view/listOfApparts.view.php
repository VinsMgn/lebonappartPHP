<?php
// require_once("../controller/listOfApparts.php");


?>
<!-- <h1> Liste des apartements</h1>-->
<!--Formulaire de recherche par ville
<p> Rechercher une ville</p>


    <form method="POST" action="../controller/listOfApparts.php">
        <div>
            <label id="searchCity">Ville :
                <select name="city">
                    <option> Montpellier</option>
                    <option> Paris</option>
                </select>
            </label>
        </div>
        <div>
            <label id = "submit">
                <input type="submit" name="submit" value="Rechercher">
            </label>
        </div>
    </form> -->

<?php

// foreach ($lobjApparts as $lobjAppart) {
// include('../helper/header.php');
//foreach ($AppartByCity as $lobjAppart) {
    ?>


    <!-- <div>
        <br>
        <div>
            Prix : <?php 
            // echo($lobjAppart->prix); ?>€
        </div>
        <div>
            Description : <?php 
            // echo($lobjAppart->description); ?>
        </div>
        <div>
            Etat : <?php 
            // echo($lobjAppart->etat); ?>
        </div>
        <div>
            Surface : <?php
            //  echo($lobjAppart->surface); ?>
        </div>
        <div>
            Meublé : <?php 
            // if ($lobjAppart->meuble == 0) {
                // echo("L'appartement n'est pas meublé");
            // } else {
                // echo("L'appartement est meublé");
            // } ?>
        </div>
        <div>
            Indice énergie : <?php
            //  echo($lobjAppart->ind_energie); ?>
        </div>
        <div>
            Date de création : <?php
            //  echo($lobjAppart->dateCreation); ?>
        </div>
        <div>
            Date d'expiration : <?php 
            // echo($lobjAppart->dateExpiration); ?>
        </div>
        <div>
            Message : <?php 
            // echo($lobjAppart->message); ?>
        </div>
        <div>
            Statut : <?php 
            // if ($lobjAppart->statut == 1) {
                // echo("L'appartement n'est pas disponible");
            // } else {
                // echo("L'appartement est disponible");
            // } ?>
        </div>
        <br>

        <div>
            <button> <a href="../controller/detailAppart.php?id=<?php 
            // echo($lobjAppart->id_appartement) ?>" style="">Voir les informations de cet appartement </a> </button>
        </div> -->
        <!--        <button> <a href = "../controller/updateUser.php" style="text-decoration: none; color: black">Modifier</a></button>-->
        <!--        <button> <a href = "../controller/deleteUser.php" style="text-decoration: none; color: black" >Supprimer</a></button>-->

        <br>
    </div>

    <?php
// };

?>
<?php
include("../helper/header.php");
require_once("../model/mainModel.php");

// session_start();
$lobjApparts = GetApparts();
?>

    <div id="mainContainer" class="container">
        <?php
        include("../helper/navbar.html");
        ?>


        <div id="contentContainer">
        
            <div class="articleBloc">

                <div class="items">
                    <div class="itemsWrapper">
                        <?php  foreach($lobjApparts as $appart  ){ 
                           ?>

                        <div class="item" style="background-image :url(../assets/img/test1.jpg)">
                            <div class="title">
                                <?php
                                // $bdd = getDataBase();
                                // $loAdHouses = getAdHousing($bdd);
                                    echo($appart->message);
                                // echo($loAdHouses[0]->title);
                                ?>

                            </div>
                            <div class="infos">
                                <div>
                                    Nombre de pièces :
                                    <?php
                                    // $bdd = getDataBase();
                                    // $loAdHouses = getAdHousing($bdd);
                                    echo($appart->nbPiece);

                                    // echo($loAdHouses[0]->rooms);
                                    ?>
                                </div>
                                <div>
                                    Ville : <?php
                                    // $bdd = getDataBase();
                                    // $loHouse = getHouseById($bdd, $_SESSION["user"][7]);
                                    // echo($loHouse[0]->address);
                                    echo($appart->FK_VILLES);

                                    ?>
                                </div>
                                <div>
                                    date : <?php
                                    // $bdd = getDataBase();
                                    // $loAdHouses = getAdHousing($bdd);
                                    echo($appart->dateCreation);

                                    // echo($loAdHouses[0]->dateStart);
                                    ?> - <?php
                                    echo($appart->dateExpiration);

                                    ?>
                                </div>
                                <a href="../controller/detailAppart.php?id=<?php echo($appart->id_appartement) ?>">
                                    Voir plus
                                </a>
                            </div>
                            <div class="more">
                                <i class="material-icons dp48">add_circle_outline</i>
                            </div>
                        </div>
                    <?php  }?>

                        <div class="item"></div>

                        <div class="item"></div>

                        <div class="item"></div>
                    </div>
                </div>

                <a href="" class="nextArrow">
                    <i class="far fa-arrow-alt-circle-right "></i>
                </a>

                <a href="" class="previousArrow">
                    <i class="far fa-arrow-alt-circle-left"></i>
                </a>

                <div class="pageIndicator">
                    2/20
                </div>

            </div>

        </div>
    </div>

<?php
include("../helper/footer.php");

?>