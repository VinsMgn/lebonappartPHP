<?php
include_once('../helper/header.php');
?>



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

                <a href="../index.php" class="close">
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


