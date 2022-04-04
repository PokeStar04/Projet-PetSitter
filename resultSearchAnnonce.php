<?php     

// echo $chien.$chat.$lapin.$rongeur.$furet.$herisson.$aquarium.$oiseaux.$reptiles;

$pays = $_POST['pays'];
$postal = $_POST['postal'];
$chien =   $_SESSION['chien'];

$service=$_POST['service'];

$startDate=strtotime(str_replace('/', '-', trim($_POST['startDate'])));
$endDate=strtotime(str_replace('/', '-', trim($_POST['endDate'])));

if (isset($_POST['pays']) && (!empty($_POST['pays'])) && isset($_POST['postal']) && (!empty($_POST['postal'])) && isset($startDate) && (!empty($startDate)) && isset($endDate) && (!empty($endDate))  ){  
?><a></br></a><?php

        $chien=$_SESSION['cc'];
        $annonce = "SELECT * FROM annonce  LEFT JOIN garder ON annonce.garder_ID = garder.id LEFT JOIN animaux ON annonce.animaux_id = animaux.id  WHERE userID IN (SELECT id FROM utilisateur WHERE pays LIKE  '%" .$_POST['pays']."%') AND (startDate BETWEEN ( $startDate - 1209600) AND $startDate ) AND (endDate BETWEEN $endDate  AND ($endDate + 1209600))   AND actif = 1 AND $service = 1 AND chien = 1";//AND note > 133
        $query = $DB->prepare($annonce);
        $query->execute();
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
        <?php }; ?>

<?php
    // }
    //var_dump ($result);
 }
else{
    echo ("mettre les informations");
}

// echo "je sui " .$chien."<br>";
// $preparedRequest3= "SELECT * FROM animaux WHERE chien = $chien AND chat = $chat AND lapin = $lapin ";
// $querry1=$DB->prepare($preparedRequest3);

// $querry1->execute();
// $resu1 = $querry1->fetchAll(PDO::FETCH_ASSOC);
// var_dump($resu1);


?>

<?php
    require_once('./_footer/footer.php');
    require_once('./_head/script.php');
?>