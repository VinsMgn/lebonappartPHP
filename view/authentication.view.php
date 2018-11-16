<?php
//$INC_DIR = $_SERVER["DOCUMENT_ROOT"];

//Ne marche qu'en chemin absolu, a voir pour le chemin relatif plus tard
//require_once("../controller/authentication.php");
include_once('../helper/header.php');
?>

<!-- <h1>Connexion à la plateforme</h1>


<form action="" method="POST" >
    <input type="text" placeholder="Veuillez entrer votre mail" name="mail"> 
    <input type="password" placeholder="Veuillez entrer votre mot de passe" name="password"> 
    <input name="submit" type="submit" value="Connexion">
</form>
        -->
 <!--Authentification page-->
<!-- <div>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email : </label>
            <input type="text" class="form-control" name="mail" placeholder="Entrez votre adresse mail"/>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe : </label>
            <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe"/>
        </div>

        <br>
        <input type="submit" value="Connecter" class="btn btn-primary"/>
    </form>
</div> -->

<div id="mainContainer" class="container">
    <?php
   
    ?>

    <div id="contentContainer">
        <div class="articleBloc plain">

            <div class="itemsWrapper">
                <div class="infoBloc">
                    <h3>
                        Connexion
                    </h3>

                    <form action="" method="POST">
                        <div class="input-field">
                            <input name="mail" type="text">
                            <label for="email" class="">Adresse e-mail</label>
                        </div>

                        <div class="input-field">
                            <input name="password" type="password">
                            <label for="password" class="">Mot de passe</label>
                        </div>


                        <button class="btn submit waves-effect waves-light" type="submit" name="submit">
                            Connexion
                            <i class="material-icons right">send</i>
                        </button>
                    </form>

                </div>

                <a href="../view/welcome.php" class="close">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </div>

        </div>

    </div>


</div>

<script>
    $(document).ready(function() {
        M.updateTextFields();
    });

    $(document).ready(function(){
        $('select').formSelect();
    });
</script>
<?php 
include_once('../helper/footer.php');

?>


