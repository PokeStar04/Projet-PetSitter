<?php
include_once('./require.php');

if(isset($_SESSION['id'])){
    header('Location: /');
    exit;
}

if(!empty($_POST)){
    if(isset($_POST['connexion'])){
        [$err_mail,$err_mdp] = $_Connexion->verif_connexion($mail,$mdp); // Données du post
    }
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
    <title>Se connecter — Petsitter</title>
    <link href="/style/formulaire.css" rel="stylesheet">
</head>
<body>
<?php require_once('./_nav/navigation.php')?>

<div class="container">
    <div class="row">
        <div class="col-4">&nbsp;</div>
        <div class="col-8">
            <h3 class="font_raleway_regular_25px black_txt">Connecte-toi à ton espace !</h3>
            <form method="post" action="">
                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label for="mail">Email</label><br/>
                            <input type="email" name="mail" id="mail" placeholder="mail" class="champs" value="<?php  if(isset($mail)){ echo $mail; } ?>"><br />
                            <?php if(isset($err_mail)){ echo $err_mail; } ?>
                        </div>
                    </div>
                
                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label for="mdp">Mot de passe</label><br/>
                            <input type="password" name="mdp" id="mdp" placeholder="mdp" class="champs" value="<?php  if(isset($mdp)){ echo $mdp; } ?>"><br />
                            <?php  if(isset($err_mdp)){ echo $err_mdp; } ?>
                        </div>
                    </div>
                
                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <button type="submit" name="connexion" class="white_txt font_raleway_regular_15px">Se connecter</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once('./_footer/footer.php')
?>
</body>
</html>