<?php
require_once("../controller/listOfAppartsUser.php");

?>
<h1> Mon appartement</h1>
    <button><a href="../welcome.php"> Voir mon profil </a></button>
    <button><a href="../controller/insertAppart.php" style="text-decoration: none; color: black">Ajouter un nouveau logement</a></button>
    <button><a href="../controller/updateAppart.php" style="text-decoration: none; color: black">Modifier les informations sur mon logement</a></button>
    <button><a href="../controller/deleteAppart.php" style="text-decoration: none; color: black">Supprimer mon logement</a></button>
<?php

foreach ($lobjApparts as $lobjAppart) {
    if ($lobjAppart->FK_USERS == $_SESSION['id']) {


        ?>

        <div>
            <br>
            <div>
                Prix : <?php echo($lobjAppart->prix); ?>€
            </div>
            <div>
                Description : <?php echo($lobjAppart->description); ?>
            </div>
            <div>
                Etat : <?php echo($lobjAppart->etat); ?>
            </div>
            <div>
                Surface : <?php echo($lobjAppart->surface); ?>
            </div>
            <div>
                Meublé : <?php if ($lobjAppart->meuble == 0) {
                    echo("L'appartement n'est pas meublé");
                } else {
                    echo("L'appartement est meublé");
                } ?>
            </div>
            <div>
                Indice énergie : <?php echo($lobjAppart->ind_energie); ?>
            </div>
            <div>
                Date de création : <?php echo($lobjAppart->dateCreation); ?>
            </div>
            <div>
                Date d'expiration : <?php echo($lobjAppart->dateExpiration); ?>
            </div>
            <div>
                Message : <?php echo($lobjAppart->message); ?>
            </div>
            <div>
                Statut : <?php if ($lobjAppart->statut == 1) {
                    echo("L'appartement n'est pas disponible");
                } else {
                    echo("L'appartement est disponible");
                } ?>
            </div>
            <br>
            <!--        <button> <a href = "../controller/updateUser.php" style="text-decoration: none; color: black">Modifier</a></button>-->
            <!--        <button> <a href = "../controller/deleteUser.php" style="text-decoration: none; color: black" >Supprimer</a></button>-->

            <br>
        </div>

        <?php
    }
};