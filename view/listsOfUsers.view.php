<h1> Liste des utilisateurs</h1>
    <button> <a href = "../insertUser.php" style="text-decoration: none; color: black" >Inscription</a></button>
<?php
foreach ($lobjUsers as $lobjUser) {
    ?>

    <div>
        <br>
        <div>
            Nom : <?php echo($lobjUser->nom); ?>
        </div>
        <div>
            Prénom : <?php echo($lobjUser->prenom); ?>
        </div>
        <div>
            Adresse : <?php echo($lobjUser->adress); ?>
        </div>
        <div>
            Téléphone : <?php echo($lobjUser->phone); ?>
        </div>
        <div>
            Mail : <?php echo($lobjUser->mail); ?>
        </div>
        <div>
            Solde : <?php echo($lobjUser->solde); ?> jetons
        </div>
        <div>
            Statut : <?php if($lobjUser->isProprietaire==1){
                echo("Propriétaire");
            }else{
                echo("Locataire");
            } ?>
        </div>
        <div>
            Pays : <?php echo($lobjUser->pays); ?>
        </div>
        <br>
        <button> <a href = "../admin/updateUser.php" style="text-decoration: none; color: black">Modifier</a></button>
        <button> <a href = "../admin/deleteUser.php" style="text-decoration: none; color: black" >Supprimer</a></button>

        <br>
    </div>

    <?php
};