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
    <p> Pour cet appartement il est nécessaire d'avoir <?php echo($lobjAppart->prix)?> jetons</p>
    <p> En effectuant la demande de location, la somme en jetons sera retirée de votre solde.</p>
</div>

<div>
    <button> Demande de location</button>
</div>