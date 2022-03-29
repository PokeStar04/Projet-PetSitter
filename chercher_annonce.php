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
<input type="search" name="pays" placeholder="pays">
<label>Code postal</label>
<input type="search" name="postal" placeholder="postal"></br>

<!-- annonce -->
<label>Début</label>
<input type="search" name="startDate" placeholder="startDate"></br>
<label>Fin</label>
<input type="search" name="endDate" placeholder="endDate"></br>

<!--garder  -->
<label>Promener</label>
<input type="checkbox" name="promener" placeholder="promener" value="promener">
<label>Nourrir</label>
<input type="checkbox" name="nourrir" placeholder="nourrir" value="nourrir">
<label>Garder</label>
<input type="checkbox" name="garder" placeholder="garder" value="garder"></br>
</br>

<!-- animaux -->
<label>Chien</label>
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
<input type="checkbox" name="reptiles" placeholder="reptiles" value="reptiles"></br>

<input type="submit">

</br>
</br>
</br>
<?php
//utilisateur
if (isset($_POST['pays']) && (!empty($_POST['pays'])) && isset($_POST['postal']) && (!empty($_POST['postal']))){
    echo $_POST['pays']; echo $_POST['postal'];
    ?><a></br></a><?php
}


//annonce
if (isset($_POST['startDate']) && (!empty($_POST['startDate'])) && isset($_POST['endDate']) && (!empty($_POST['endDate']))){
    echo $_POST['startDate']; echo $_POST['endDate'];
    ?><a></br></a><?php
}
//garder

$sql = 'SELECT * FROM `garder`';
$query = $DB->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);




foreach($result as $info){
    echo $info['id'];
}

if (!empty($_POST)){
    if (!empty($_POST['promener'])){
        echo $_POST['promener'];
        ?><a></br></a><?php
    }
    if (!empty($_POST['nourrir'])){
        echo $_POST['nourrir'];
        ?><a></br></a><?php
    }
    if (!empty($_POST['garder'])){
        echo $_POST['garder'];
        ?><a></br></a><?php
    }
}else{
    ?>
        <a>choisissez un service</a><br/>
    <?php
}

//animaux

if (!empty($_POST)) {

    if (!empty($_POST['chien'])){
        echo $_POST['chien'];
        ?><a></br></a><?php
    }
    if (!empty($_POST['chat'])){
        echo $_POST['chat'];
        ?><a></br></a><?php
    }
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
    <a>choisissez un animal</a>
    <?php
}

?>

</body>
</html>
<!-- uncheck permet de vérifier si c'est c'est null ou non -->