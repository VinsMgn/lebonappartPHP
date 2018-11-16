<?php

// require_once("../controller/detailAppart.php");
?> 
<!-- <h1> Informations</h1> -->
<?php

// if ($lobjAppart) {
    ?>
    <div>
        Prix : <?php echo($lobjAppart->prix); ?> jetons
        <!-- Prix : <?php //echo($lobjAppart->prix); ?> euros -->
    </div>
    <div>
        <!-- Description : <?php //echo($lobjAppart->description); ?> -->
    </div>
    <div>
        <!-- Etat : <?php //echo($lobjAppart->etat); ?> -->
    </div>
    <div>
        <!-- Nombre de pièces : <?php //echo($lobjAppart->nbPiece); ?> -->
    </div>
    <div>
        <!-- Surface : <?php //echo($lobjAppart->surface); ?> m² -->
    </div>
    <div>
    <!-- Meublé : <?php 
        // if ($lobjAppart->meuble == 1) {
        //     echo("Oui");
        // } else {
        //     echo("Non");
        // }; ?>
    </div>
    <div>
        Indice énergie : <?php //echo($lobjAppart->ind_energie); ?>
    </div>
    <div>
        Création : <?php //echo($lobjAppart->dateCreation); ?>
    </div>
    <div>
        Informations supplémentaires : <?php //echo($lobjAppart->message); ?>
    </div>
    <div>
        Statut : <?php
        //if ($lobjAppart->statut == 1) {
            //echo("Libre");
       // } else {
          //  echo("Occupé");
      //  }; ?>
    </div>
    <div>
        Propriétaire : <?php echo($lobjUser->nom);
        echo(" " . $lobjUser->prenom); ?>
        Occupé par : <?php //echo($lobjUser->nom); echo(" ".$lobjUser->prenom); ?>
    </div>
    <div>
        Ville : <?php //echo($lobjCity->nomVille); ?>
    </div>
    <div>
        Quartier : <?php// echo($lobjQuartier->nomQuartier); ?>
    </div>
    <br><br>
    <button> Ce logement m'intéresse</button> -->
<?php //}?>
 <?php 
require('../helper/header.php') 
 ?>
<div id="mainContainer" class="container">
        <?php
        include("../helper/navbar.html")
        ?>
        <div id="contentContainer">
            <div class="articleBloc plain">

                <div class="itemsWrapper">
                    <div class="infoBloc">
                        <h3>
                            <?php
                            echo($lobjAppart->message);
                            ?>

                        </h3>

                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="../assets/img/test1.jpg" target="_blank">
                                        <img src="../assets/img/test1.jpg" height='auto' width='100%'>
                                    </a>
                                </div>
                            </div>

                            <div class="swiper-pagination"></div>

                            <!-- Add arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                        <p>
                            <?php
                            echo($lobjAppart->message);
                            ?>
                        </p>
                    </div>

                    <div class="infoBloc alt">

                        <h4>Informations</h4>

                        <div class="info">
                            <span class="typeInfo">Frais : </span>
                            <?php
                            echo($lobjAppart->prix);
                            ?> jetons/semaine
                        </div>

                        <div class="info">
                            <span class="typeInfo">Disponibilités : </span>
                            <?php
                            echo($lobjAppart->dateCreation);
                            ?> - <?php
                            echo($lobjAppart->dateExpiration);
                            ?>
                        </div>

                        <div class="info">
                            <span class="typeInfo">Nombre de pièce(s) : </span>
                            <?php
                            echo($lobjAppart->nbPiece);
                            ?>
                        </div>
                        <div class="info">
                            <span class="typeInfo">Superficie : </span>
                            <?php
                            echo($lobjAppart->surface);
                            ?>m²
                        </div>
                        <div class="info">
                            <span class="typeInfo">
                                <a href="../controller/detailProprietaire.php?id=<?php echo($lobjAppart->FK_USERS) ?>">Ce logement m'intéresse</a>
                            </span>

                        </div>
                    </div>
                    <a href="../controller/listOfApparts.php" class="close">
                        <i class="far fa-times-circle"></i>
                    </a>
                </div>

            </div>

        </div>


    </div>
      

    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination'
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });
    </script>
    <?php
include("../helper/footer.php")
?>
