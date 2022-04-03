<?php
include_once('./require.php');

if(isset($_SESSION['id'])){
    header('Location: /');
    exit;
}
if(isset($_SESSION['id'])){

$var = 'Bonjour '. $_SESSION['prenom'].  $_SESSION['nom'];
}else{
$var = 'Bonjour à tous';
}










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
   <title>Document</title>
</head>
<body>
    <?php  require_once('./_nav/navigation.php')?>

<!-- <h1> chercher une annonce </h1>


<form method="post"> -->
    
<!-- utilisateur -->
<!-- <label>Pays</label>
<input type="text" name="pays" placeholder="pays" >
<label>Code postal</label>
<input type="text" name="postal" placeholder="postal" ></br> -->


<!-- annonce -->
<!-- <label>Début</label>
<input type="search" name="startDate" placeholder="startDate"></br>
<label>Fin</label>
<input type="search" name="endDate" placeholder="endDate"></br> -->

<!--garder  -->
<!-- <label>Promener</label>
<input class="nourrir" type="radio" name="service" placeholder="promener" value="promener">
<label>Nourrir</label>
<input class="promener" type="radio" name="service" placeholder="nourrir" value="nourrir">
<label>Garder</label>
<input class="garder" type="radio" name="service" placeholder="garder" value="garder"></br>
</br> -->

<!-- animaux -->
<!-- <label>chien</label>
<input type="checkbox" name="animaux" placeholder="chien" value="">
<label>Chat</label>
<input type="checkbox" name="animaux" placeholder="chat" value="">
<label>Lapin</label>
<input type="checkbox" name="animaux" placeholder="lapin" value=""></br>
<label>Rongeur</label>
<input type="checkbox" name="animaux" placeholder="rongeur" value="">
<label>Furet</label>
<input type="checkbox" name="animaux" placeholder="furet" value="">
<label>Hérisson</label>
<input type="checkbox" name="animaux" placeholder="herisson" value=""></br>
<label>Aquarium</label>
<input type="checkbox" name="animaux" placeholder="aquarium" value="">
<label>Oiseaux</label>
<input type="checkbox" name="animaux" placeholder="oiseaux" value="">
<label>Reptiles</label>
<input type="checkbox" name="animaux" placeholder="reptiles" value=""></br>

<input type="submit">
</form>
</br>
</br>
</br> -->
<?php


//annonce
// if (isset($_POST['startDate']) && (!empty($_POST['startDate'])) && isset($_POST['endDate']) && (!empty($_POST['endDate']))){
//     echo $_POST['startDate']; echo $_POST['endDate'];
//     ?><a></br></a><?php
// }
//garder









$sql = "SELECT * FROM `garder` WHERE ".$_POST['service']."=1";
$query = $DB->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
echo "je suis ".$nourrir;


if (($_POST['service']) == 'promener'){
    
    foreach($result as $info){
        $annonce = 'SELECT * FROM `annonce` WHERE userID IN (SELECT userID FROM garder WHERE `promener`="1")';
        $query = $DB->prepare($annonce);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
     
        ?> <br><br><?php
    }
    var_dump ($result);
}
elseif (($_POST['service']) == 'nourrir'){
    foreach($result as $info){
        $annonce = 'SELECT * FROM `annonce` WHERE userID IN (SELECT userID FROM garder WHERE `nourrir`="1")';
        $query = $DB->prepare($annonce);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
     
        ?> <br><br><?php
    }
    var_dump ($result);
}
elseif (($_POST['service']) == 'garder'){
    foreach($result as $info){
        $annonce = 'SELECT * FROM `annonce` WHERE userID IN (SELECT userID FROM garder WHERE `garder`="1")';
        $query = $DB->prepare($annonce);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
     
        ?> <br><br><?php
    }
    var_dump ($result);
}
else{
    echo "cocher une case";
}
//Je fais ma requete
// Ma boucle d'affichage
var_dump($_POST['service']);

//animaux




if (!empty($_POST)) {

    $sql = "SELECT * FROM `animaux` WHERE ".$_POST['animaux']."=1";
    $query = $DB->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);









    // if (($_POST['animaux'])== 'chien'){
    //     ?><a></br></a><?php
    //     foreach($result as $geo){

    //         $annonce = 'SELECT * FROM `annonce` WHERE userID IN (SELECT userID FROM animaux WHERE `chien`="1")';
        
    //         $query = $DB->prepare($annonce);
    //         $query->execute();
    //         $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //     }
    
    
    // }

    // if (($_POST['animaux'])== 'chat'){
    //     ?><a></br></a>
    <?php
    //     foreach($result as $geo){

    //         $annonce = 'SELECT * FROM `annonce` WHERE userID IN (SELECT userID FROM animaux WHERE `chat`="1")';
        
    //         $query = $DB->prepare($annonce);
    //         $query->execute();
    //         $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //     }

    
    // }


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
}
else{
     ?>  
     <a>choisissez un animal</a>    <?php
 }
//  $preparedRequest2 = $DB->prepare('SELECT chien, chat, lapin, rongeur, furet, herisson, aquarium, oiseaux, reptiles FROM animaux ');
 
 

//  //$preparedRequest2->bindValue('userID', $_SESSION['id'], PDO::PARAM_INT);
 
//  $preparedRequest2->execute();
//  $resu = $preparedRequest2->fetchAll(PDO::FETCH_ASSOC);
 //var_dump($resu);
//    $chien = $_POST['chien'];
//    echo "je suis un : .$chien.".var_dump($chien) ." poilu ";
//  echo $chien;






?>


<h1> chercher une annonce </h1>


<form method="POST">
    
<!-- utilisateur -->
<label>Pays</label>
<input type="text" name="pays" placeholder="pays" >
<label>Code postal</label>
<input type="text" name="postal" placeholder="postal" ></br>

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


<!-- annonce -->
<!-- <label>Début</label>
<input type="search" name="startDate" placeholder="startDate"></br>
<label>Fin</label>
<input type="search" name="endDate" placeholder="endDate"></br> -->

<!--garder  -->
<label>Promener</label>
<input class="nourrir" type="radio" name="service" placeholder="promener" value="promener">
<label>Nourrir</label>
<input class="promener" type="radio" name="service" placeholder="nourrir" value="<?php isset($_POST['service']) ? $nourrir = 1 : $nourrir = 0   ?>">
<label>Garder</label>
<input class="garder" type="radio" name="service" placeholder="garder" value="garder"></br>
</br>

<!-- animaux -->
<label>Chien</label>
<input type="checkbox" name="chien" placeholder="chien"  value="<?php  isset($_POST['chien']) ? $chien = 1 : $chien=0?>">
<label>Chat</label>
<input type="checkbox" name="chat" placeholder="chat" value="<?php  isset($_POST['chat']) ? $chat = 1 : $chat=0?>">
<label>Lapin</label>
<input type="checkbox" name="lapin" placeholder="lapin" value="<?php  isset($_POST['lapin']) ? $lapin = 1 : $lapin=0?>">
</br>
<label>Rongeur</label>
<input type="checkbox" name="rongeur" placeholder="rongeur" value="<?php  isset($_POST['rongeur']) ? $rongeur = 1 : $rongeur=0?>">
<label>furet</label>
<input type="checkbox" name="furet" placeholder="furet" value="<?php  isset($_POST['furet']) ? $furet = 1 : $furet=0?>">
<label>herisson</label>
<input type="checkbox" name="herisson" placeholder="herisson" value="<?php  isset($_POST['herisson']) ? $herisson = 1 : $herisson=0?>">
<label>aqarium</label>
<input type="checkbox" name="aquarium" placeholder="aquarium" value="<?php  isset($_POST['aquarium']) ? $aquarium = 1 : $aquarium=0?>"></br>
<label>oiseaux</label>
<input type="checkbox" name="oiseaux" placeholder="oiseaux" value="<?php  isset($_POST['oiseaux']) ? $oiseaux = 1 : $oiseaux=0?>">
<label>reptiles</label>
<input type="checkbox" name="reptiles" placeholder="reptiles" value="<?php  isset($_POST['reptiles']) ? $reptiles = 1 : $reptiles=0?>">



<input type="submit" name="submit">

</form>
<?php  echo $chien.$chat.$lapin.$rongeur.$furet.$herisson.$aquarium.$oiseaux.$reptiles;

$pays = $_POST['pays'];
$postal = $_POST['postal'];
//utilisateur

echo "je suis " .$ab ."sqdqks,dkq,d";
$startDate=strtotime(str_replace('/', '-', trim($_POST['startDate'])));
$endDate=strtotime(str_replace('/', '-', trim($_POST['endDate'])));
echo $startDate.$endDate;

if (isset($_POST['pays']) && (!empty($_POST['pays'])) && isset($_POST['postal']) && (!empty($_POST['postal'])) && isset($startDate) && (!empty($startDate)) && isset($endDate) && (!empty($endDate)) ){
    
    ?><a></br></a><?php

 
   
 



        //$annonce = "SELECT * FROM annonce WHERE userID IN (SELECT id FROM utilisateur WHERE pays LIKE  '%" .$_POST['pays']."%' AND postal LIKE '%".$_POST['postal']."%') ";
        $annonce = "SELECT * FROM annonce garder WHERE userID IN (SELECT id FROM utilisateur WHERE pays LIKE  '%" .$_POST['pays']."%') AND (startDate BETWEEN ( $startDate - 1209600) AND $startDate ) AND (endDate BETWEEN $endDate  AND ($endDate + 1209600))  AND actif = 1 ";//AND note > 133

        $query = $DB->prepare($annonce);
        $query->execute();
        $result1 = $query->fetchAll(PDO::FETCH_ASSOC);
    
    var_dump($result1);
    // foreach($result as $geo){

    //     $annonce = "SELECT * FROM `annonce` WHERE userID IN (SELECT id FROM `utilisateur` WHERE postal LIKE '%" .$_POST['postal']."%')";
    
    //     $query = $DB->prepare($annonce);
    //     $query->execute();
    //     $result = $query->fetchAll(PDO::FETCH_ASSOC);



    // }
    //var_dump ($result);
 }
else{
    echo ("mettre les informations");
}

echo "je sui " .$chien."<br>";
$preparedRequest3= "SELECT * FROM animaux WHERE chien = $chien AND chat = $chat AND lapin = $lapin ";
$querry1=$DB->prepare($preparedRequest3);

$querry1->execute();
$resu1 = $querry1->fetchAll(PDO::FETCH_ASSOC);
var_dump($resu1);

echo "je suis ".$nourrir;
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