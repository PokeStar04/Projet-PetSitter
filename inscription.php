<?php
include_once('./_db/connexionDB.php');

if(isset($_SESSION['id'])){
    header('Location: /');
    exit;
}

if(!empty($_POST)){

    $valid = (boolean) true;

    if(isset($_POST['inscription'])){
    
    //Donnée du post
    $nom = ucfirst(trim($_POST['nom'])) ;
    $prenom = ucfirst(trim($_POST['prenom'])) ;
    $naissance = trim($_POST['naissance']);
    $mail = trim($_POST['mail']);
    $telephone = trim($_POST['telephone']);
    $photo = trim($_POST['photo']);
    $pays = trim($_POST['pays']);
    $postal=trim($_POST{'postal'});
    $ville = ucfirst(trim($_POST['ville'])) ;
    $rue = trim($_POST['rue']);
    $garder = trim($_POST['garder']);
    $mdp = trim($_POST['mdp']);


    //Gestion message d'erreur
    if (empty($nom)){
    $valid=false;
    $err_nom = "Ce champ ne peut être vide";
    }

    if (empty($prenom)){
        $valid=false;
        $err_prenom = "Ce champ ne peut être vide";
        }

    if (empty($naissance)){
        $valid=false;
        $err_naissance = "Ce champ ne peut être vide";
        }
    
    if (empty($mail)){
        $valid=false;
        $err_mail = "Ce champ ne peut être vide";
        }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            $valid = false;
            $err_mail = "Format de votre e-mail invalide.";


        }//Maximum de 50 caracteres pour le mail
        elseif(strlen($mail) > 50){
            $valid = false;
            $err_mail = "Votre e-mail doit avoir un maximum de 50 caractères.";
        }
        else{
            //verifier qu'il y a pas déjà le même mail
            $req = $DB ->prepare("SELECT id FROM utilisateur WHERE mail = ?");
            $req -> execute(array($mail));
            $req = $req->fetch();
            //Si ma requete contient un information au niveau de l'id alors le mail est pas unique 
            if(isset($req['id'])){
                $valid = false;
                $err_mail = "Cette adresse e-mail est déjà utilisée ";
            }else{
                $valid = true;
            }


        }
    if (empty($telephone)){
        $valid=false;
        $err_telephone = "Ce champ ne peut être vide";
        }
    if (empty($photo)){
        $valid=false;
        $err_photo = "Ce champ ne peut être vide";
        }
    if (empty($pays)){
        $valid=false;
        $err_pays = "Ce champ ne peut être vide";
        }
    if (empty($ville)){
        $valid=false;
        $err_ville = "Ce champ ne peut être vide";
        }
    if (empty($postal)){
        $valid=false;
        $err_postal = "Ce champ ne peut être vide";
        }
    if (empty($rue)){
        $valid=false;
        $err_rue = "Ce champ ne peut être vide";
        }
    if (empty($garder)){
        $valid=false;
        $err_garder = "Ce champ ne peut être vide";
        
        }
    if (empty($mdp)){
        $valid=false;
        $err_mdp = "Ce champ ne peut être vide";
        }




        if ($valid){
        //insert into dans la bd
            $preparedRequest = $DB->prepare('INSERT INTO utilisateur (nom, prenom,naissance,mail,telephone,photo,pays,ville,postal,rue,garder,mdp) VALUES (:nom,:prenom,:naissance,:mail,:telephone,:photo,:pays,:ville,:postal,:rue,:garder,:mdp)');
            $preparedRequest->bindValue('nom', $_POST['nom'], PDO::PARAM_STR);
            $preparedRequest->bindValue('prenom', $_POST['prenom'], PDO::PARAM_STR);
            $preparedRequest->bindValue('naissance', $_POST['naissance'], PDO::PARAM_INT);
            $preparedRequest->bindValue('mail', $_POST['mail'], PDO::PARAM_STR);
            $preparedRequest->bindValue('telephone', $_POST['telephone'], PDO::PARAM_INT);
            $preparedRequest->bindValue('photo', $_POST['photo'], PDO::PARAM_INT);
            $preparedRequest->bindValue('pays', $_POST['pays'], PDO::PARAM_STR);
            $preparedRequest->bindValue('ville', $_POST['ville'], PDO::PARAM_STR);
            $preparedRequest->bindValue('postal', $_POST['postal'], PDO::PARAM_INT);
            $preparedRequest->bindValue('rue', $_POST['rue'], PDO::PARAM_INT);
            $preparedRequest->bindValue('garder', $_POST['garder'], PDO::PARAM_INT);
            $preparedRequest->bindValue('mdp', $_POST['mdp'], PDO::PARAM_STR);
            $preparedRequest->execute();
        
            header('Location: connexion.php');
            require_once('close.php');
            
        }else{
            //rien ne se passe 
        }

}
    else{
       
    }

}
var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">
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
    <?php  if(isset($err_nom)){ echo $err_nom; } ?>
        <label>Nom</label>
        <input type="text" name="nom" placeholder="nom" value="<?php  if(isset($nom)){ echo $nom; } ?>"><br />
        <?php  if(isset($err_prenom)){ echo $err_prenom; } ?>
        <label>Prenom</label>
        <input type="text" name="prenom" placeholder="prenom" value="<?php  if(isset($prenom)){ echo $prenom; } ?>"><br />
        <?php  if(isset($err_naissance)){ echo $err_naissance; } ?>
        <label>Date de naissance</label>
        <input type="text" name="naissance" placeholder="naissance" value="<?php  if(isset($naissance)){ echo $naissance; } ?>"><br />
        <?php  if(isset($err_mail)){ echo $err_mail; } ?>
        <label>Email</label>
        <input type="email" name="mail" placeholder="mail" value="<?php  if(isset($mail)){ echo $mail; } ?>"><br />
        <?php  if(isset($err_telephone)){ echo $err_telephone; } ?>
        <label>Telephone</label>
        <input type="text" name="telephone" placeholder="telephone" value="<?php  if(isset($telephone)){ echo $telephone; } ?>"><br />
        <?php  if(isset($err_photo)){ echo $err_photo; } ?>
        <label>Photo de Profil</label>
        <input type="text" name="photo" placeholder="photo" value="<?php  if(isset($photo)){ echo $photo; } ?>"><br />
        <?php  if(isset($err_pays)){ echo $err_pays; } ?>
        <label>Pays</label>
        <input type="text" name="pays" placeholder="pays" value="<?php  if(isset($pays)){ echo $pays; } ?>"><br />
        <?php  if(isset($err_ville)){ echo $err_ville; } ?>
        <label>Ville</label>
        <input type="text" name="ville" placeholder="ville" value="<?php  if(isset($ville)){ echo $ville; } ?>"><br />
        <?php  if(isset($err_postal)){ echo $err_postal; } ?>
        <label>Code Postal</label>
        <input type="text" name="postal" placeholder="postal" value="<?php  if(isset($postal)){ echo $postal; } ?>"><br />
        <?php  if(isset($err_rue)){ echo $err_rue; } ?>
        <label>Rue</label>
        <input type="text" name="rue" placeholder="rue" value="<?php  if(isset($rue)){ echo $rue; } ?>"><br />
        <?php  if(isset($err_garder)){ echo $err_garder; } ?>
        <label>garder</label>
        <input type="text" name="garder" placeholder="garder" value="<?php  if(isset($garder)){ echo $garder; } ?>"><br />
        <?php  if(isset($err_mdp)){ echo $err_mdp; } ?>
        <label>Mot de passe</label>
        <input type="password" name="mdp" placeholder="mdp" value="<?php  if(isset($mdp)){ echo $mdp; } ?>"><br />
        <button type="submit" name="inscription">Go !</button>





    </form>



   

<?php
require_once('./_footer/footer.php')
?>
</body>
</html>