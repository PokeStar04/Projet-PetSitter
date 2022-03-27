<?php
include_once('./_db/connexionDB.php');

if(isset($_SESSION['id'])){
    header('Location: /');
    exit;
}

if(!empty($_POST)){

    $valid = (boolean) true;

    if(isset($_POST['connexion'])){
    
    //Donnée du post
 
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];


    //Gestion message d'erreur
        if (empty($mail)){
        $valid=false;
        $err_mail = "Ce champ ne peut être vide";
        }
        if (empty($mdp)){
            $valid=false;
            $err_mdp = "Ce champ ne peut être vide";
            }





        if($valid){
            //verifier qu'il y a pas déjà le même mail
            $req = $DB ->prepare("SELECT mdp FROM utilisateur WHERE mail = ?");
            $req -> execute(array($mail));
            $req = $req->fetch();
            require_once('close.php');
            //Si ma requete contient un information au niveau de mdp 
            if(isset($req['mdp'])){
                if($mdp !== $req['mdp']){
                    $valid = false;
                    $err_mail = "Cette adresse ou mot de passe est incorect";
                }
                
                
            }else{
                $valid = false;
                $err_mail = "Cette adresse ou mot de passe est incorect";
                echo $req['mdp'];
            }


        }





        if ($valid){

            $req = $DB ->prepare("SELECT * FROM utilisateur WHERE mail = ?");
            $req -> execute(array($mail));
            $req_connexion = $req->fetch();
            require_once('close.php');
  


            if(isset($req_connexion['id'])){
            
            $_SESSION['id']= $req_connexion['id'];
            $_SESSION['nom']= $req_connexion['nom'];
            $_SESSION['prenom']= $req_connexion['prenom'];
            $_SESSION['naissance']= $req_connexion['naissance'];
            $_SESSION['mail']= $req_connexion['mail'];
            $_SESSION['telephone']= $req_connexion['telephone'];
            $_SESSION['photo']= $req_connexion['photo'];
            $_SESSION['pays']= $req_connexion['pays'];
            $_SESSION['ville']= $req_connexion['ville'];
            $_SESSION['postal']= $req_connexion['postal'];
            $_SESSION['rue']= $req_connexion['rue'];
            $_SESSION['garder']= $req_connexion['garder'];
            $_SESSION['mdp']= $req_connexion['mdp '];

            header('Location: /');
           
           
           
           
            }else{
                $valid = false;
                $err_mail = "Cette adresse ou mot de passe est incorect";
            }

            $preparedRequest->execute();
        
            header('Location: connexion.php');
            //insert to dans la bd
        }else{
            //rien ne se passe 
        }

}
    else{
       
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