<?php
require_once("../controller/listOfApparts.php");


?><h1> Liste des apartements</h1>

    <button><a href="/view/profil.php"> Voir mon profil </a></button>
    <!--Formulaire de recherche par ville-->
    <h2> Rechercher un appartement dans une ville</h2>


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
            <label id="submit">
                <input type="submit" name="submit" value="Rechercher">
            </label>
        </div>
    </form>

<?php

foreach ($lobjApparts as $lobjAppart) {

//foreach ($AppartByCity as $lobjAppart) {
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

        <div>
            <button><a href="../controller/detailAppart.php?id=<?php echo($lobjAppart->id_appartement) ?>" style="">Voir
                    les informations de cet appartement </a></button>
        </div>
        <!--        <button> <a href = "../controller/updateUser.php" style="text-decoration: none; color: black">Modifier</a></button>-->
        <!--        <button> <a href = "../controller/deleteUser.php" style="text-decoration: none; color: black" >Supprimer</a></button>-->

        <br>
    </div>

    <?php
};