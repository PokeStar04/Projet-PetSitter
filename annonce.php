<?php
include_once('./require.php');









$preparedRequest = $DB->prepare('INSERT INTO annonce (horaire,startDate, endDate,note,actif,userID) VALUES (:horaire,:startDate, :endDate,:note,:actif,:userID)');
         
            $preparedRequest->bindValue('horaire', $_POST['horaire'], PDO::PARAM_INT);
            $preparedRequest->bindValue('startDate', $_POST['startDate'], PDO::PARAM_INT);
            $preparedRequest->bindValue('endDate', $_POST['endDate'], PDO::PARAM_INT);
            $preparedRequest->bindValue('note', $_POST['note'], PDO::PARAM_INT);
            $preparedRequest->bindValue('actif', $_POST['actif'], PDO::PARAM_BOOL);
            $preparedRequest->bindValue('userID', $_SESSION['id'], PDO::PARAM_INT);
            $preparedRequest->execute();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php require_once('./_head/meta.php');
      require_once('./_head/link.php');
      require_once('./_head/script.php');
?>

    <title>Annonce </title>
    <?= $_SESSION['id']?>
</head>
<body>
<?php  require_once('./_nav/navigation.php')?>
<form method="post">
    <label>horaire</label>
    <input type="text" name="horaire" placeholder="horaire" value="<?php  if(isset($horaire)){ echo $horaire; } ?>"><br />

    
    <label>startDate</label>
    <input type="text" name="startDate" placeholder="startDate" value="<?php  if(isset($startDate)){ echo $startDate; } ?>"><br />
    
    <label>endDate</label>
    <input type="text" name="endDate" placeholder="endDate" value="<?php  if(isset($endDate)){ echo $endDate; } ?>"><br />
    
    <label>note</label>
    <input type="text" name="note" placeholder="note" value="<?php  if(isset($note)){ echo $note; } ?>"><br />
 
    <label>actif</label>
    <input type="checkbox" name="actif" placeholder="actif" value="<?php  if(isset($actif)){ echo $actif; } ?>"><br />
    <button type="submit" name="createAnnonce">Crée ton annonce</button>
</form>
    
    <?php  if(isset($err_prenom)){ echo $err_prenom; } ?>

    
<?php
require_once('./_footer/footer.php')
?>
</body>
</html>