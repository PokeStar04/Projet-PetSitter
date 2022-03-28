<?php
include_once('_db/connexionDB.php');


?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php require_once('./_head/meta.php');
      require_once('./_head/link.php');
      require_once('./_head/script.php');
?>

    <title>Annonce </title>
</head>
<body>

    <label>horaire</label>
    <input type="text" name="horaire" placeholder="horaire" value="<?php  if(isset($horaire)){ echo $horaire; } ?>"><br />
    <?php  if(isset($err_prenom)){ echo $err_prenom; } ?>
    <label>prix</label>
    <input type="text" name="prix" placeholder="prix" value="<?php  if(isset($prix)){ echo $prix; } ?>"><br />
    <?php  if(isset($err_prenom)){ echo $err_prenom; } ?>
    <label>horaire</label>
    <input type="text" name="horaire" placeholder="horaire" value="<?php  if(isset($horaire)){ echo $horaire; } ?>"><br />
    <?php  if(isset($err_prenom)){ echo $err_prenom; } ?>
    <label>horaire</label>
    <input type="text" name="horaire" placeholder="horaire" value="<?php  if(isset($horaire)){ echo $horaire; } ?>"><br />
    <?php  if(isset($err_prenom)){ echo $err_prenom; } ?>
    <label>horaire</label>
    <input type="text" name="horaire" placeholder="horaire" value="<?php  if(isset($horaire)){ echo $horaire; } ?>"><br />
    <?php  if(isset($err_prenom)){ echo $err_prenom; } ?>
    <label>horaire</label>
    <input type="text" name="horaire" placeholder="horaire" value="<?php  if(isset($horaire)){ echo $horaire; } ?>"><br />
    <?php  if(isset($err_prenom)){ echo $err_prenom; } ?>
    <label>horaire</label>
    <input type="text" name="horaire" placeholder="horaire" value="<?php  if(isset($horaire)){ echo $horaire; } ?>"><br />
    <?php  if(isset($err_prenom)){ echo $err_prenom; } ?>

    
<?php
require_once('./_footer/footer.php')
?>
</body>
</html>