<?php

if ($lobjAppart) {
    ?>
    <!-- Formulaire HTML pour modifier les données-->
    <h1> Modifiez le logement </h1>
    <div>
        <form method="post" action="../controller/updateAppart.php">
            <div class="input-field">
                <label for="identifiant" class="" hidden="hidden">
                    <input required name="identifiant" type="text" value="<?php echo($lobjAppart->id_appartement);?>" >
                </label>
                <label for="prix" class=""> Prix
                    <input required name="prix" type="text" value="<?php echo($lobjAppart->prix);?>">
                </label>
            </div>

            <div class="input-field">

                <label for="description" class="">Description
                    <input required name="description" type="text" value="<?php echo($lobjAppart->description);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="etat" class=""> Etat
                    <input required name="etat" type="text" value="<?php echo($lobjAppart->etat);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="nbPiece" class=""> Nombre de pièce(s)
                    <input required name="nbPiece" type="text" value="<?php echo($lobjAppart->nbPiece);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="surface" class=""> Surface
                    <input required name="surface" type="text" value="<?php echo($lobjAppart->surface);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="meuble" class=""> Meublé
                    <select name="meuble">
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </label>
            </div>
            <div class="input-field">
                <label for="ind_energie" class=""> Indice d'énergie
                    <input required name="ind_energie" type="text" value="<?php echo($lobjAppart->ind_energie);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="creation" class=""> Création
                    <input required name="creation" type="text" value="<?php echo($lobjAppart->dateCreation);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="expiration" class=""> Expiration du bail
                    <input required name="expiration" type="text" value="<?php echo($lobjAppart->dateExpiration);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="message" class=""> Message supplémentaire
                    <input required name="message" type="text" value="<?php echo($lobjAppart->message);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="expiration" class=""> Statut
                    <select name="statut">
                        <option value="1">Occupé</option>
                        <option value="0">Disponible</option>
                    </select>
                </label>
            </div>
            <div class="input-field">
                <label for="submit" class="">
                    <input required name="submit" type="submit" value="Modifier mes données">
                </label>
            </div>
        </form>
        <button> <a href = "../index.php" style="text-decoration: none; color: black" >Mon profil</a></button>
        <button> <a href = "../controller/listOfAppartsUser.php" style="text-decoration: none; color: black" >Retour</a></button>
    </div>
<?php }