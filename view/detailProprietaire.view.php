<?php
require_once("../controller/detailProprietaire.php"); ?>

<h1> Voici les détails du propriétaire</h1>

<div id="nom">
    Nom : <?php echo($lobjProprio->nom); ?>
</div>
<div id="prenom">
    Prénom : <?php echo($lobjProprio->prenom); ?>
</div>
<div id="mail">
    Mail : <?php echo($lobjProprio->mail); ?>
</div>
<div id="nom">
    Phone : <?php echo($lobjProprio->phone); ?>
</div>


<div>
    <p> Pour cet appartement il est nécessaire d'avoir <?php echo($lobjAppart->prix) ?> jetons</p>
    <p> En effectuant la demande de location, la somme en jetons sera retirée de votre solde jusqu'à acceptation du
        propriétaire.</p>
</div>

<div>
    <form method="GET" action="../controller/detailProprietaire.php?id=<?php echo($lobjAppart->FK_USERS);?>">
        <label>
            <input type="text" name= "id" value="<?php echo($lobjAppart->FK_USERS);?>"
        </label>
        <label>
            <input type="submit" name="OK" value="Demande de location">
        </label>
    </form>
</div>