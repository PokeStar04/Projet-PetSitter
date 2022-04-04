<?php
include_once('./require.php');
session_start();

?>


<!-- 
<script> type="text/javasript" src="jquery".js></script>
<script> type="text/javasript" src="checkbox.js"></script> -->

<!DOCTYPE html>
<html lang="fr">
<head>
<?php 
require_once('./_head/meta.php');
require_once('./_head/link.php');
require_once('./_head/script.php');

?>
<link href="/style/resultats-style.css" rel="stylesheet">
<link href="/style/formulaire.css" rel="stylesheet">
<link href="/style/chercher-annonce.css" rel="stylesheet">

   <title>Document</title>
</head>
<body>
    <?php  require_once('./_nav/navigation.php')?>


<?php



    if (!empty($_POST['lapin'])){
        echo $_POST['lapin'];
        ?><a></br></a><?php
    }
    if (!empty($_POST['rongeur'])){
        echo $_POST['rongeur'];
        ?><a></br></a><?php
    }
    if (!empty($_POST['furet'])){
        echo $_POST['furet'];
        ?><a></br></a><?php
    }
    if (!empty($_POST['herisson'])){
        echo $_POST['herisson'];
        ?><a></br></a><?php
    }
    if (!empty($_POST['aquarium'])){
        echo $_POST['aquarium'];
        ?><a></br></a><?php
    }
    if (!empty($_POST['oiseaux'])){
        echo $_POST['oiseaux'];
        ?><a></br></a><?php
    }
    if (!empty($_POST['reptiles'])){
        echo $_POST['reptiles'];
        ?><a></br></a><?php
    }



?>





    

<form method="post" >
    <div class="container">
        <div class="row">
            <div class="col-3">&nbsp;</div>

            <div class="col-7">
                <h3 class="font_raleway_regular_25px">Trouve ton Petsitter idéal</h3>

                <div class="row font_raleway_regular_15px lightgrey_txt">
                    <div class="col-4">
                        <label for="pays">Pays*</label><br />
                        <input type="text" name="pays" placeholder="pays" class="champs" value="<?php if (isset($pays)) echo $pays; ?>" required>
                        <?php if (isset($err_pays)) {
                            echo $err_pays;
                        } ?>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-4">
                        <label for="postal">Code Postal*</label><br />
                        <input type="text" name="postal" id="postal" placeholder="postal" class="champs" value="<?php if (isset($postal)) echo $postal; ?>" required>
                        <?php if (isset($postal)) {
                            echo $postal;
                        } ?>
                    </div>
                </div>


                <div class="row font_raleway_regular_15px lightgrey_txt">
                    <div class="col-12">
                        <label for="startDate">Sur quelle période en avez-vous besoin ?</label>
                    </div>
                    <div id="range">
                        <div class="col-4">
                            <input type="text" name="startDate" id="startDate" class="champs" value="<?php if (isset($startDate)) echo $startDate; ?>">
                        </div>

                        <div class="col-1">
                            <span class="lightgrey_txt">à</span>
                        </div>

                        <div class="col-4">
                            <input type="text" name="endDate" class="champs" value="<?php if (isset($endDate)) echo $endDate; ?>">
                        </div>
                    </div>
                </div>

                

                <div class="row">
                    <div class="col-12 font_raleway_regular_15px lightgrey_txt">
                        <p>Je souhaite...*</p>
                        
                    </div>
                </div>

                <div class="row services">
                    <div class="font_raleway_regular_15px green_txt">
                        <div class="col-3">
                            <input type="radio" id="nourrir" name="service" value="nourrir">
                            <label for="nourrir">Nourrir</label>
                        </div>
                        <div class="col-3">
                            <input type="radio" id="promener" name="service" value="promener">
                            <label for="promener">Promener</label>
                        </div>
                        <div class="col-3">
                            <input type="radio" id="garder" name="service" value="garder">
                            <label for="garder">Garder</label>
                        </div>
                    </div>
                </div>
                <div class="row services">
                    <div class="font_raleway_regular_15px green_txt">
                        <div class="col-12 lightgrey_txt">                            
                            <label>Choisissez les animaux que vous pouvez garder :</label>
                        </div>
                        <div class="col-6">

                            <input type="checkbox" id="chien" name="chien" placeholder="chien" value="<?php  isset($_POST['chien']) ? $_POST['chien']=1 : $_POST['chien']=0  ?>">
                            <label for="chien">Chien</label><br>

                            <input type="checkbox" id="chat" name="chat" placeholder="chat" alue="<?php  isset($_POST['chat']) ? $_POST['chat']=1 : $_POST['chat']=0  ?>"> 
                            <label for="chat">Chat</label><br>

                            <input type="checkbox" id="lapin" name="lapin" placeholder="lapin" value="<?php  isset($_POST['lapin']) ? $_POST['lapin']=1 : $_POST['lapin']=0  ?>"> 
                            <label for="lapin">Lapin</label><br>

                            <input type="checkbox" id="rongeur" name="rongeur" placeholder="rongeur" value="<?php  isset($_POST['rongeur']) ? $_POST['rongeur']=1 : $_POST['rongeur']=0  ?>"> 
                            <label for="rongeur">Rongeur</label><br>

                            <input type="checkbox" id="furet" name="furet" placeholder="furet" value="<?php  isset($_POST['furet']) ? $_POST['furet']=1 : $_POST['furet']=0  ?>"> 
                            <label for="furet">Furet</label><br>
                        </div>
                        <div class="col-6">
                            <input type="checkbox" id="herisson" name="herisson" placeholder="herisson" value="<?php  isset($_POST['herisson']) ? $_POST['herisson']=1 : $_POST['herisson']=0  ?>"> 
                            <label for="herisson">Hérisson</label><br>

                            <input type="checkbox" id="aquarium" name="aquarium" placeholder="aquarium" value="<?php  isset($_POST['aquarium']) ? $_POST['aquarium']=1 : $_POST['aquarium']=0  ?>"> 
                            <label for="aquarium">Aquarium</label><br>

                            <input type="checkbox" id="oiseaux" name="oiseaux" placeholder="oiseaux" value="<?php  isset($_POST['oiseaux']) ? $_POST['oiseaux']=1 : $_POST['oiseaux']=0  ?>"> 
                            <label for="oiseaux">Oiseaux</label><br>

                            <input type="checkbox" id="reptiles" name="reptiles" placeholder="reptiles"value="<?php  isset($_POST['reptiles']) ? $_POST['reptiles']=1 : $_POST['reptiles']=0  ?>"> 
                            <label for="reptiles">Reptiles</label><br>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <button type="submit" name="submit" class="white_txt font_raleway_regular_15px">Trouver le meilleur petsitter</button>
                    </div>
                </div>
            </div>

            <div class="col-2"></div>
        </div> <!-- /row -->
    </div> <!-- /container -->
</form>


<div class="container">

<?php 
if(isset($_POST) && (!empty($_POST))){
    // echo $chien.$chat.$lapin.$rongeur.$furet.$herisson.$aquarium.$oiseaux.$reptiles;

    $pays = $_POST['pays'];
    $postal = $_POST['postal'];
    $chien =   $_POST['chien'];
    $chat =   $_POST['chat'];
    $lapin =   $_POST['lapin'];
    $rongeur =   $_POST['rongeur'];
    $furet =   $_POST['furet'];
    $herisson =   $_POST['herisson'];
    $aquarium =   $_POST['aquarium'];
    $oiseaux =   $_POST['oiseaux'];
    $reptiles =   $_POST['reptiles'];

    $service=$_POST['service'];

    $startDate=strtotime(str_replace('/', '-', trim($_POST['startDate'])));
    $endDate=strtotime(str_replace('/', '-', trim($_POST['endDate'])));

    if (isset($_POST['pays']) && (!empty($_POST['pays'])) && isset($_POST['postal']) && (!empty($_POST['postal'])) && isset($startDate) && (!empty($startDate)) && isset($endDate) && (!empty($endDate))  ){
  
    ?>
    </br>
    <?php
        $annonce = "SELECT * FROM annonce  LEFT JOIN garder ON annonce.garder_ID = garder.id LEFT JOIN animaux ON annonce.animaux_id = animaux.id  WHERE userID IN (SELECT id FROM utilisateur WHERE pays LIKE  '%" .$_POST['pays']."%') AND (startDate BETWEEN ( $startDate - 1209600) AND $startDate ) AND (endDate BETWEEN $endDate  AND ($endDate + 1209600))   AND actif = 1 AND $service = 1 AND chien = $chien AND chat = $chat AND lapin = $lapin AND rongeur = $rongeur AND furet=$furet AND herisson=$herisson AND aquarium=$aquarium AND oiseaux=$oiseaux AND reptiles=$reptiles";//AND note > 133
        $query = $DB->prepare($annonce);
        $query->execute();
        $rows = $query->rowCount();
        if($rows > 0){
            
       
        $infoRecherche = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($infoRecherche as $info){
            $i = $info['userID'];
            $userInfo = "SELECT id,prenom,naissance,nom,photo FROM utilisateur WHERE id = $i ";
            $annonceInfo = $DB->prepare($userInfo);
            $annonceInfo->execute();
            $annonce = $annonceInfo->fetch(PDO::FETCH_ASSOC);
        ?>


            <div class="row box font_raleway_regular_15px">
                <div class="col-1">
                    <img class="img-rond-75" src="./upload/<?= $annonce['photo']?>">
                </div>
                <div class="col-11 info-petsitter">
                    <span class="yellow_txt"><?php echo $annonce['prenom'] ?>, <?php echo floor( (time() - $annonce['naissance']) / 31556926 ) // 31556926 = nb of seconds in a year ?> ans </span>
                    <p>“<?= $info['biographie']?> </p>
                    
                    <p>Disponible du <?php echo date( 'd/m/Y', $info['startDate'] ) ?> au <?= date( 'd/m/Y', $info['endDate'] ) ?> à <?= $info['horaire'] ?>h pour <?= $annonce['garder'] ? 'garder, ' : null ?> <?php echo $annonce['nourrir'] ? 'nourrir, ' : null ?> <?php echo $annonce['promener'] ? 'promener' : null ?></p>
                    <p class="lightgrey_txt">Tarif : <?=$info['prix']?>€/jour</p>
                    <p class="lightgrey_txt">Note : <?php echo $annonce['note'] ?>/5</p>
                    <a href='profil.php?id=<?php echo $annonce['id'] ?>'>
                        <button class="white_txt font_raleway_regular_15px">Consulter le profil</button>
                    </a>
                </div>
            </div>
        <?php 
            } // fin du foreach 
        } // fin du if
        else { // message d'erreur
        ?>

            <div class="row">
                <div class="col-12 font_raleway_regular_15px"> 
                    <p class=" erreur">Malheureusement, nous n'avons trouvé aucun petsitter correspondant à ta demande 😔 </p>
                    <p> Essaie un autre moment, peut-être qu'une offre correspondante à ta recherche sera disponible !</p>

                </div>

            </div>

        <?php
        }
        ?>


<?php
 } // if isset post fields
} // if isset post




?>





    
    </div></div>

<?php
    require_once('./_footer/footer.php');
    require_once('./_head/script.php');
?>

<link href="style/datepicker.min.css" rel="stylesheet">
    <script src="script/datepicker-full.min.js"></script>

    <script>
        const elem = document.querySelector('#range')
        const dateRangePicker = new DateRangePicker(elem, {
            format: 'dd/mm/yyyy'
        })
    </script>

</br>
</br>
</br>
</body>
</html>
<!-- uncheck permet de vérifier si c'est c'est null ou non -->