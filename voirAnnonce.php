<?php
include_once('./require.php');


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
<?php require_once('./_nav/navigation.php')?>
<h1>Les Annonces</h1>

<form method="get">
<input type="search" name="recherche" placeholder="nom">
<!--<input type="search" name="recherche2" placeholder="endDate ">-->
<input type="submit">


</form>

<?php

 $sql = 'SELECT nom FROM `utilisateur`ORDER BY id DESC';
 $query = $DB->prepare($sql);
 $query->execute();
 $result = $query->fetchAll(PDO::FETCH_ASSOC);
 var_dump($result);

   $recherche = $_GET['recherche'];
   echo $recherche;
   
$allAnnonce = $DB->querry('SELECT nom FROM utilisateur ORDER BY id DESC');
 


 
    $result = $DB->querry("SELECT nom FROM utilisateur LIKE '%'.$recherche.'%'");
    $result ->execure();
    var_dump($result);


?>


<?php


    // $recherche2 = htmlspecialchars($_GET['recherche2']);
    // $rechercheEndDate = $DB->querry('SELECT endDate FROM annonce LIKE "%'.$recherche2.'%"');




    
   

require_once('./_footer/footer.php');
?>
</body>
</html>