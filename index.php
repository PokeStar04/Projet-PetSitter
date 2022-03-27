<?php
include_once('_db/connexionDB.php');


if(isset($_SESSION['id'])){

    $var = 'Bonjour '. $_SESSION['prenom'].  $_SESSION['nom'];
}else{
    $var = 'Bonjour à tous';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php require_once('./_head/meta.php');
      require_once('./_head/link.php');
      require_once('./_head/script.php');
?>

    <title>Document</title>
</head>
<body>
<?php require_once('./_nav/navigation.php')?>
<h1><?= $var ?></h1>


<?php
require_once('./_footer/footer.php')
?>
</body>
</html>