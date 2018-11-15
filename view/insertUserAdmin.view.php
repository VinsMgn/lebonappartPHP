<h1> Inscription à la plateforme</h1>

<div class="formcontainer">

    <form method="post" action="">
        
        <div class="input-field">
            <label for="name" class=""> Nom
                <input required name="name" type="text">
            </label>
        </div>

        <div class="input-field">

            <label for="firstname" class="">Prénom
                <input required name="firstname" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="adress" class=""> Adresse
                <input required name="adress" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="phone" class=""> Téléphone
                <input required name="phone" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="mail" class=""> Mail
                <input required name="mail" type="email">
            </label>
        </div>
        <div class="input-field">
            <label for="country" class=""> Pays
                <input required name="country" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="password" class=""> Mot de passe
                <input required name="password" type="password">
            </label>
        </div>
        <label for="type">Type</label>
        <select name="type" id="">
            <option value="locataire">locataire</option>
            <option value="loueur">loueur</option>
        </select>
        </div>
        <div class="input-field">
            <label for="solde" class=""> Solde (0 si aucun)
                <input required name="solde" type="text">
            </label>
        </div>
        <div class="input-field">
            <label for="submit" class="">
                <input required name="submit" type="submit" value="Enregistrer">
            </label>
        </div>
        <label for="isAdmin">Administrateur</label>
        <select name="isAdmin" id="">
            <option value="0">Non</option>
            <option value="1">Oui</option>
        </select>
    </form>
    <button> <a href = "../admin/listOfUsers.php" style="text-decoration: none; color: black" >Retour</a></button>
</div>

