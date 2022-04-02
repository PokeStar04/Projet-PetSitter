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








$pays = htmlspecialchars(trim($_POST['pays']));
$postal = htmlspecialchars(trim($_POST['postal']));



?>



<script> type="text/javasript" src="jquery".js></script>
<script> type="text/javasript" src="checkbox.js"></script>

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

<h1> chercher une annonce </h1>


<form method="post">
    
<!-- utilisateur -->
<label>Pays</label>
<input type="text" name="pays" placeholder="pays" value="<?php if (isset($pays)) echo $pays; ?>">
<label>Code postal</label>
<input type="text" name="postal" placeholder="postal" value="<?php if (isset($postal)) echo $postal; ?>"></br>


<!-- annonce -->
<!-- <label>Début</label>
<input type="search" name="startDate" placeholder="startDate"></br>
<label>Fin</label>
<input type="search" name="endDate" placeholder="endDate"></br> -->

<!--garder  -->
<label>Promener</label>
<input class="nourrir" type="radio" name="service" placeholder="promener" value="promener">
<label>Nourrir</label>
<input class="promener" type="radio" name="service" placeholder="nourrir" value="nourrir">
<label>Garder</label>
<input class="garder" type="radio" name="service" placeholder="garder" value="garder"></br>
</br>

<!-- animaux -->
<!-- <label>Chien</label>
<input type="checkbox" name="chien" placeholder="chien" value="chien">
<label>Chat</label>
<input type="checkbox" name="chat" placeholder="chat" value="chat">
<label>Lapin</label>
<input type="checkbox" name="lapin" placeholder="lapin" value="lapin"></br>
<label>Rongeur</label>
<input type="checkbox" name="rongeur" placeholder="rongeur" value="rongeur">
<label>Furet</label>
<input type="checkbox" name="furet" placeholder="furet" value="furet">
<label>Hérisson</label>
<input type="checkbox" name="herisson" placeholder="herisson" value="herisson"></br>
<label>Aquarium</label>
<input type="checkbox" name="aquarium" placeholder="aquarium" value="aquarium">
<label>Oiseaux</label>
<input type="checkbox" name="oiseaux" placeholder="oiseaux" value="oiseaux">
<label>Reptiles</label>
<input type="checkbox" name="reptiles" placeholder="reptiles" value="reptiles"></br> -->

<input type="submit">
</form>
</br>
</br>
</br>
<?php
//utilisateur
if (isset($_POST['pays']) && (!empty($_POST['pays'])) && isset($_POST['postal']) && (!empty($_POST['postal']))){

    ?><a></br></a><?php

    // $preparedRequest = $DB->prepare('INSERT INTO search_annonce (pays2, ville2 ,startDate2 ,endDate2) VALUES (:pays2,:ville2,:startDate2,:endDate2)');

    // $preparedRequest->bindValue('pays2', $_POST['pays2'], PDO::PARAM_STR);
    // $preparedRequest->bindValue('ville2', $_POST['prenom'], PDO::PARAM_STR);
    // $preparedRequest->bindValue('starDate2', $_POST['startDate2'], PDO::PARAM_INT);
    // $preparedRequest->bindValue('endDate2', $_POST['endDate2'], PDO::PARAM_STR);
    // $preparedRequest->execute();



    $sql = "SELECT pays, postal FROM `utilisateur`";
    $query = $DB->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $geo){

        $annonce = "SELECT * FROM `annonce` WHERE userID IN (SELECT id FROM `utilisateur` WHERE pays =".$pays.")";
        $query->bindValue('pays', $_POST['pays'], PDO::PARAM_STR);
        $query = $DB->prepare($annonce);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);



        // if ($_POST('pays') == $PAYS)
    }
    var_dump ($result);

    // foreach($result as $geo){

    //     $annonce = "SELECT * FROM `annonce` WHERE userID IN (SELECT id FROM `utilisateur` WHERE".$postal.  ")";
    //     $query->bindValue('pays', $_POST['postal'], PDO::PARAM_STR);
    //     $query = $DB->prepare($annonce);
    //     $query->execute();
    //     $result = $query->fetchAll(PDO::FETCH_ASSOC);



    //     // if ($_POST('pays') == $PAYS)
    // }
    // var_dump ($result);





 }
else{
    echo ("mettre les informations");
}

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


//animaux

// if (!empty($_POST)) {

//     if (!empty($_POST['chien'])){
//         echo $_POST['chien'];
//         ?><a></br></a><?php
//     }
//     if (!empty($_POST['chat'])){
//         echo $_POST['chat'];
//         ?><a></br></a><?php
//     }
//     if (!empty($_POST['lapin'])){
//         echo $_POST['lapin'];
//         ?><a></br></a><?php
//     }
//     if (!empty($_POST['rongeur'])){
//         echo $_POST['rongeur'];
//         ?><a></br></a><?php
//     }
//     if (!empty($_POST['furet'])){
//         echo $_POST['furet'];
//         ?><a></br></a><?php
//     }
//     if (!empty($_POST['herisson'])){
//         echo $_POST['herisson'];
//         ?><a></br></a><?php
//     }
//     if (!empty($_POST['aquarium'])){
//         echo $_POST['aquarium'];
//         ?><a></br></a><?php
//     }
//     if (!empty($_POST['oiseaux'])){
//         echo $_POST['oiseaux'];
//         ?><a></br></a><?php
//     }
//     if (!empty($_POST['reptiles'])){
//         echo $_POST['reptiles'];
//         ?><a></br></a><?php
//     }
// }
// else{
//     ?>  
<!-- //     <a>choisissez un animal</a> -->    <?php
// }

?>

</body>
</html>
<!-- uncheck permet de vérifier si c'est c'est null ou non -->