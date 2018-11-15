<?php

require_once("../controller/detailAppart.php");

?> <h1> Informations</h1>
<?php

if ($lobjAppart) {
    ?>
    <div>
        Prix : <?php echo($lobjAppart->prix); ?> euros
    </div>
    <div>
        Description : <?php echo($lobjAppart->description); ?>
    </div>
    <div>
        Etat : <?php echo($lobjAppart->etat); ?>
    </div>
    <div>
        Nombre de pièces : <?php echo($lobjAppart->nbPiece); ?>
    </div>
    <div>
        Surface : <?php echo($lobjAppart->surface); ?> m²
    </div>
    <div>
        Meublé : <?php
        if ($lobjAppart->meuble == 1) {
            echo("Oui");
        } else {
            echo("Non");
        }; ?>
    </div>
    <div>
        Indice énergie : <?php echo($lobjAppart->ind_energie); ?>
    </div>
    <div>
        Création : <?php echo($lobjAppart->dateCreation); ?>
    </div>
    <div>
        Informations supplémentaires : <?php echo($lobjAppart->message); ?>
    </div>
    <div>
        Statut : <?php
        if ($lobjAppart->statut == 1) {
            echo("Libre");
        } else {
            echo("Occupé");
        }; ?>
    </div>
    <div>
        Occupé par : <?php echo($lobjUser->nom); echo(" ".$lobjUser->prenom); ?>
    </div>
    <div>
        Ville : <?php echo($lobjCity->nomVille); ?>
    </div>
    <div>
        Quartier : <?php echo($lobjQuartier->nomQuartier); ?>
    </div>
    <br><br>
    <button> Ce logement m'intéresse</button>
<?php }