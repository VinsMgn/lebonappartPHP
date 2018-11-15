<?php

if ($lobjUser) {
    ?>
    <!-- Formulaire HTML pour modifier les données-->
    <h1> Modifiez vos informations </h1>
    <div>
        <form method="post" action="../controller/admin/updateUser.php">
            <div class="input-field">
                <label for="identifiant" class="" hidden="hidden">
                    <input required name="identifiant" type="text" value="<?php echo($lobjUser->id);?>" >
                </label>
                <label for="name" class=""> Nom
                    <input required name="name" type="text" value="<?php echo($lobjUser->nom);?>">
                </label>
            </div>

            <div class="input-field">

                <label for="firstname" class="">Prénom
                    <input required name="firstname" type="text" value="<?php echo($lobjUser->prenom);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="adress" class=""> Adresse
                    <input required name="adress" type="text" value="<?php echo($lobjUser->adress);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="phone" class=""> Téléphone
                    <input required name="phone" type="text" value="<?php echo($lobjUser->phone);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="mail" class=""> Mail
                    <input required name="mail" type="email" value="<?php echo($lobjUser->mail);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="country" class=""> Pays
                    <input required name="country" type="text" value="<?php echo($lobjUser->pays);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="password" class=""> Mot de passe
                    <input required name="password" type="password" value="<?php echo($lobjUser->password);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="type" class=""> Statut
                    <input required name="type" type="text" value="<?php if($lobjUser->isProprietaire == 1){
                        echo ("Propriétaire");
                    }else{
                        echo("Locataire");
                    }?>">
                </label>
            </div>
            <div class="input-field">
                <label for="solde" class=""> Solde (0 si aucun)
                    <input required name="solde" type="text" value="<?php echo($lobjUser->solde);?>">
                </label>
            </div>
            <div class="input-field">
                <label for="submit" class="">
                    <input required name="submit" type="submit" value="Modifier mes données">
                </label>
            </div>
        </form>
        <button> <a href = "../admin/listOfUsers.php" style="text-decoration: none; color: black" >Retour</a></button>
    </div>
<?php }