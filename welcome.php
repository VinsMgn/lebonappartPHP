
<?php
 $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
 $RQT_URL = $_SERVER['REQUEST_URI'];

require_once("./helper/authGuard.php");

session_start();
AuthGuard($RQT_URL);

$QRY_STR = $_SERVER['QUERY_STRING'];

if ($QRY_STR == 'error=2') {
    echo("Vous n'êtes pas administrateur ! ");
}
include('./helper/header.php');
require_once("./model/mainModel.php");

?>
    <div id="mainContainer" class="container">
        <?php
        include("./helper/navbar.html");

        ?>

        <div id="contentContainer" class="scrollable">

            <div class="profileContainer">
                <div class="user">
                    <img class="pp" src="/assets/img/yv.png">
                    <h3 class="ellipsis">
                        <?php $lobjUser = GetUser($_SESSION['id']);
                        echo($lobjUser->prenom . " ".$lobjUser->nom); ?>
                    </h3>
                </div>

                <div class="itemsWrapper">

                    <div class="userInfos">
                        <span class="title">Informations</span>
                        <ul>
                            <li>
                                <span class="typeInfo">Nom : </span>
                                <?php echo($lobjUser->nom); ?>
                            </li>
                            <li>
                                <span class="typeInfo">Prénom : </span>
                                <?php echo($lobjUser->prenom); ?>
                            </li>
                            <li>
                                <span class="typeInfo">Adresse : </span>
                                <?php echo($lobjUser->adress); ?>
                            </li>
                            <li>
                                <span class="typeInfo">Mail : </span>
                                <?php echo($lobjUser->mail); ?>
                            </li>
                            <li>
                                <span class="typeInfo">Pays : </span>
                                <?php echo($lobjUser->pays); ?>
                            </li>
                            <li>
                                <span class="typeInfo">Solde : </span>
                                <?php echo($lobjUser->solde); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="userAds">
                        <a href="./controller/listOfAppartsUser.php">Mon logement
                    </div>


                </div>

                <a href="./controller/insertAppart.php" class="btn submit waves-effect waves-light">Ajouter un logement
                    <i class="material-icons right">add_circle</i>
                </a>

                <!--                </button>-->
            </div>

        </div>


    </div>

<?php
include("./helper/footer.php");
?>