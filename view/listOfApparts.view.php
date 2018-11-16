<?php
// require_once("../controller/listOfApparts.php");


?>
<!-- <h1> Liste des apartements</h1>-->
<!--Formulaire de recherche par ville
<p> Rechercher une ville</p>

    <button><a href="/view/profil.php"> Voir mon profil </a></button>
    Formulaire de recherche par ville-->
    <h2> Rechercher un appartement dans une ville</h2>

    <form method="POST" action="../controller/listOfApparts.php">
        <div>
            <label id="searchCity">Ville :</label>
            <select name="city" class="cityForm"> test
                <?php foreach($lobjVilles as $ville){?>
                <option value="<?php echo($ville->cpVille); ?>" style=" z-index:8; display: block; color:black;"> <?php echo($ville->nomVille);   ?></option>
                <?php }?>
            </select>
        </div>
        <div>
            <label id="submit">
            </label>

                <input type="submit" name="submit" value="Rechercher">
        </div>
    </form> 

<?php
include("../helper/header.php");
require_once("../model/mainModel.php");

// session_start();
$lobjApparts = GetApparts();
?>
    
    <div id="mainContainer" class="container">
        <?php
        include("../helper/navbar.html");
        ?>

        <form style="  margin-top:46px; width:375px; z-index:5;">
            <div class="input-field search input-search-bar">
                <input id="search" type="search" required>
                <label class="label-icon search-icon" for="search"><i class="material-icons ">search</i></label>
                <i class="material-icons cross-icon">close</i>
            </div>
        </form>
        <div id="contentContainer">
        
            <div class="articleBloc">

                <div class="items">
                    <div class="itemsWrapper">
                        <?php  foreach($lobjApparts as $appart  ){ 
                           ?>

                        <div class="item" style="background-image :url(../assets/img/test1.jpg)">
                            <div class="title">
                                <?php
                                // $bdd = getDataBase();
                                // $loAdHouses = getAdHousing($bdd);
                                    echo($appart->message);
                                // echo($loAdHouses[0]->title);
                                ?>

                            </div>
                            <div class="infos">
                                <div>
                                    Nombre de pièces :
                                    <?php
                                    echo($appart->nbPiece);

                                    ?>
                                </div>
                                <div>
                                    Ville : <?php
                                    
                                    echo($appart->FK_VILLES);

                                    ?>
                                </div>
                                <div>
                                    date : <?php
                                    // $bdd = getDataBase();
                                    // $loAdHouses = getAdHousing($bdd);
                                    echo($appart->dateCreation);

                                    // echo($loAdHouses[0]->dateStart);
                                    ?> - <?php
                                    echo($appart->dateExpiration);

                                    ?>
                                </div>
                                <a href="../controller/detailAppart.php?id=<?php echo($appart->id_appartement) ?>">
                                    Voir plus
                                </a>
                            </div>
                            <div class="more">
                                <i class="material-icons dp48">add_circle_outline</i>
                            </div>
                        </div>
                    <?php  }?>

                        <div class="item"></div>

                        <div class="item"></div>

                        <div class="item"></div>
                    </div>
                </div>

                <a href="" class="nextArrow">
                    <i class="far fa-arrow-alt-circle-right "></i>
                </a>

                <a href="" class="previousArrow">
                    <i class="far fa-arrow-alt-circle-left"></i>
                </a>

                <div class="pageIndicator">
                    2/20
                </div>

            </div>

        </div>
    </div>
<?php
include("../helper/footer.php");

?>