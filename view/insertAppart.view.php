<?php
//$INC_DIR = $_SERVER["DOCUMENT_ROOT"];

//Ne marche qu'en chemin absolu, a voir pour le chemin relatif plus tard
//require_once("../controller/insertAppart.php");
?>

<h1> Ajout d'un appartement à la plateforme</h1>

<div class="formcontainer">

    <form method="post" action="../controller/insertAppart.php">
        <div class="input-field">
            <label for="id" class="">Identifiant
                <input required name="id" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="prix" class=""> Prix
                <input required name="prix" type="text">
            </label>
        </div>

        <div class="input-field">
            <label for="description" class="">Description
                <input required name="description" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="etat" class=""> Etat
                <input required name="etat" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="nbPiece" class=""> Nombre de pièces
                <input required name="nbPiece" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="surface" class=""> Surface
                <input required name="surface" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="meuble" class=""> Meublé
                <input required name="meuble" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="indEnergy" class=""> Indice énergie
                <input required name="indEnergy" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="creation" class=""> Création
                <input required name="creation" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="expiration" class=""> Expiration
                <input required name="expiration" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="message" class=""> Message
                <input required name="message" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="statut" class=""> Statut
                <input required name="statut" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="user" class="" hidden="hidden"> Id User
                <input required name="user" type="text" value="<?php $_SESSION['id'];?>">
            </label>
        </div>
        <div class="input-field">
            <label for="quartier" class=""> Id Quartier
                <input required name="quartier" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="town" class=""> Id Ville
                <input required name="town" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="submit" class="">
                <input required name="submit" type="submit" value="Enregistrer">
            </label>
        </div>
    </form>
    <button> <a href = "../controller/listOfApparts.php" style="text-decoration: none; color: black" >Retour</a></button>
</div>

