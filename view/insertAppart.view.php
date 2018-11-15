<?php
//$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
include_once('../helper/header.php');
//Ne marche qu'en chemin absolu, a voir pour le chemin relatif plus tard
//require_once("../controller/insertAppart.php");
?>

<h1> Ajout d'un appartement à la plateforme</h1>

<div class="formcontainer">

    <form method="POST" action="">
        <!--        <div class="input-field">-->
        <!--            <label for="id" class="">Identifiant-->
        <!--                <input  name="id" type="text">-->
        <!--            </label>-->
        <!--        </div>-->
        <div class="input-field">
            <label for="prix" class=""> Prix
                <input name="prix" type="text">
            </label>
        </div>

        <div class="input-field">
            <label for="description" class="">Description
                <input name="description" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="etat" class=""> Etat
                <input name="etat" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="nbPiece" class=""> Nombre de pièces
                <input name="nbPiece" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="surface" class=""> Surface
                <input name="surface" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="meuble" class=""> Meublé
                <input name="meuble" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="indEnergy" class=""> Indice énergie
                <input name="indEnergy" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="creation" class=""> Création
                <input name="creation" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="expiration" class=""> Expiration
                <input name="expiration" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="message" class=""> Message
                <input name="message" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="statut" class=""> Statut
                <input name="statut" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="user" class="" hidden="hidden"> Id User
                <input name="user" type="text" value="<?php $_SESSION['id']; ?>">
            </label>
        </div>

        <div class="input-field">
            <label for="town" class=""> CP Ville
                <input name="town" id="cpInput" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="quartier"> Nom Quartier
                <input name="quartier" type="text">
            </label>
        </div>
        <div id="quartInput" class="quartInput-unpinned">
            <label for="expiration" class="">
                <select name="quartier" id="quartSelect">


                </select>
            </label>
        </div>
        <div class="input-field">
            <label for="submit" class="">
                <input name="submit" type="submit" value="Enregistrer">
            </label>
        </div>
    </form>
    <button><a href="../controller/listOfApparts.php" style="text-decoration: none; color: black">Retour</a></button>
</div>

<?php 
    include_once('../helper/footer.php');   
?>