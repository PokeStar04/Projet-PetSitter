<?php
include_once('./require.php');


if(isset($_SESSION['id'])){
    header('Location: /');
    exit;
}

if(!empty($_POST)){

    

    if(isset($_POST['connexion'])){
    

        [$err_mail,$err_mdp] = $_Connexion->verif_connexion($mail,$mdp);
    //Donnée du post
 
    
 }

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
<?php  require_once('./_nav/navigation.php')?>



<form method="post" action="">

        <?php  if(isset($err_mail)){ echo $err_mail; } ?>
        <label>Email</label>
        <input type="email" name="mail" placeholder="mail" value="<?php  if(isset($mail)){ echo $mail; } ?>"><br />
      
        <?php  if(isset($err_mdp)){ echo $err_mdp; } ?>

        <label>Mot de passe</label>
        <input type="password" name="mdp" placeholder="mdp" value="<?php  if(isset($mdp)){ echo $mdp; } ?>"><br />
        <button type="submit" name="connexion">Se connecter</button>





    </form>










<?php
require_once('./_footer/footer.php')
?>
</body>
</html>