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
<link href="/style/resultats-style.css" rel="stylesheet">

<link href="/style/chercher-annonce.css" rel="stylesheet">
<link href="/style/formulaire.css" rel="stylesheet">
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


//
//
//





?>



<h1> chercher une annonce </h1>
<div class="container">



<?php 

if(isset($_POST) && (!empty($_POST))){

    require_once('resultSearchAnnonce.php');
}


else{ 
require_once('userSearchAnnonce.php');
     
}

?>





    
    </div>


<!-- annonce -->
<!-- <label>Début</label>
<input type="search" name="startDate" placeholder="startDate"></br>
<label>Fin</label>
<input type="search" name="endDate" placeholder="endDate"></br> -->



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