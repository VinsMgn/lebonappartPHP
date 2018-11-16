<?php

if ($lobjAppart) {
    ?>
    <!-- Formulaire HTML pour modifier les données-->
    <h1> Voulez-vous supprimer votre appartement ? </h1>
    <div>
        <form method="post" action="../controller/deleteAppart.php">
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
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
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
                        <option value="occupe">Occupé</option>
                        <option value="disponible">Disponible</option>
                    </select>
                </label>
            </div>
            <div class="input-field">
                <label for="submit" class="">
                    <input required name="submit" type="submit" value="Supprimer mes données">
                </label>
            </div>
        </form>
        <button> <a href = "../welcome.php" style="text-decoration: none; color: black" >Mon profil</a></button>
        <button> <a href = "../controller/listOfAppartsUser.php" style="text-decoration: none; color: black" >Retour</a></button>
    </div>
<?php }