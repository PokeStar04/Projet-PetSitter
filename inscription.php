<?php
include_once('./require.php');

if (isset($_SESSION['id'])) {
    header('Location: /');
    exit;
}

if (!empty($_POST)) {

    $valid = (bool) true;
    if(isset($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
    
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
    
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        $maxSize = 400000;
    
        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
    
            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName.".".$extension;
            //$file = 5f586bf96dcd38.73540086.jpg
    
            move_uploaded_file($tmpName, './upload/'.$file);
            echo $file;
    
            $req = $DB->prepare("INSERT INTO file (name) VALUES (?)");
            $req->execute([$file]);
    
            echo "Image enregistrée";
        }
        else{
            echo "Une erreur est survenue";
        }
    }

    if (isset($_REQUEST['mdp'])){
  
        $mdp = password_hash(stripslashes($_REQUEST['mdp']), PASSWORD_DEFAULT);}

    if (isset($_POST['inscription'])) {

        //Donnée du post

        $nom = htmlspecialchars(ucfirst(trim($_POST['nom'])));
        $prenom = htmlspecialchars(ucfirst(trim($_POST['prenom'])));
        $naissance = strtotime(str_replace('/', '-', trim($_POST['naissance']))); // https://www.php.net/manual/fr/function.strtotime.php
        $mail = htmlspecialchars(trim($_POST['mail']));
        $telephone = htmlspecialchars(trim($_POST['telephone']));
        $photo = htmlspecialchars(trim($file));
        $pays = htmlspecialchars(trim($_POST['pays']));
        $postal = htmlspecialchars(trim($_POST['postal']));
        $ville = htmlspecialchars(ucfirst(trim($_POST['ville'])));
        $rue = htmlspecialchars(trim($_POST['rue']));
    
        $promener = htmlspecialchars(trim($_POST['promener']));
        $nourrir = htmlspecialchars(trim($_POST['nourrir']));
        $garder = htmlspecialchars(trim($_POST['garder']));
        echo $file;




        //Gestion message d'erreur
        if (empty($nom)) {
            $valid = false;
            $err_nom = "Ce champ ne peut être vide";
        }

        if (empty($prenom)) {
            $valid = false;
            $err_prenom = "Ce champ ne peut être vide";
        }

        if (empty($naissance)) {
            $valid = false;
            $err_naissance = "Ce champ ne peut être vide";
        }

        if (empty($mail)) {
            $valid = false;
            $err_mail = "Ce champ ne peut être vide";
        } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $valid = false;
            $err_mail = "Format de votre e-mail invalide.";
        } elseif (strlen($mail) > 50) { //Maximum de 50 caracteres pour le mail
            $valid = false;
            $err_mail = "Votre e-mail doit avoir un maximum de 50 caractères.";
        } else {
            //verifier qu'il y a pas déjà le même mail
            $req = $DB->prepare("SELECT id FROM utilisateur WHERE mail = ?");
            $req->execute(array($mail));
            $req = $req->fetch();
            //Si ma requete contient un information au niveau de l'id alors le mail est pas unique 
            if (isset($req['id'])) {
                $valid = false;
                $err_mail = "Cette adresse e-mail est déjà utilisée ";
            } else {
                $valid = true;
            }
        }

        if (empty($telephone)) {
            $valid = false;
            $err_telephone = "Ce champ ne peut être vide";
        }
        if (empty($photo)) {
            $valid = false;
            $err_photo = "Ce champ ne peut être vide";
        }
        if (empty($pays)) {
            $valid = false;
            $err_pays = "Ce champ ne peut être vide";
        }
        if (empty($ville)) {
            $valid = false;
            $err_ville = "Ce champ ne peut être vide";
        }
        if (empty($postal)) {
            $valid = false;
            $err_postal = "Ce champ ne peut être vide";
        }
        if (empty($rue)) {
            $valid = false;
            $err_rue = "Ce champ ne peut être vide";
        }
        if (empty($mdp)) {
            $valid = false;
            $err_mdp = "Ce champ ne peut être vide";
        }

        if ($valid) {
            //insert into dans la bd

            $preparedRequest = $DB->prepare('INSERT INTO utilisateur (nom, prenom,naissance,mail,telephone,photo,pays,ville,postal,rue,mdp) VALUES (:nom,:prenom,:naissance,:mail,:telephone,:photo,:pays,:ville,:postal,:rue,:mdp)');

            $preparedRequest->bindValue('nom', $_POST['nom'], PDO::PARAM_STR);
            $preparedRequest->bindValue('prenom', $_POST['prenom'], PDO::PARAM_STR);
            $preparedRequest->bindValue('naissance', $naissance);
            $preparedRequest->bindValue('mail', $_POST['mail'], PDO::PARAM_STR);
            $preparedRequest->bindValue('telephone', $_POST['telephone'], PDO::PARAM_INT);
            $preparedRequest->bindValue('photo', $file, PDO::PARAM_STR);
            $preparedRequest->bindValue('pays', $_POST['pays'], PDO::PARAM_STR);
            $preparedRequest->bindValue('ville', $_POST['ville'], PDO::PARAM_STR);
            $preparedRequest->bindValue('postal', $_POST['postal'], PDO::PARAM_INT);
            $preparedRequest->bindValue('rue', $_POST['rue'], PDO::PARAM_INT);
            $preparedRequest->bindValue(':mdp', $mdp, PDO::PARAM_STR);

            $preparedRequest->execute();
            $userID = $DB->lastInsertId();

            $preparedRequest2 = $DB->prepare('INSERT INTO garder (promener, nourrir, garder, userID) VALUES (:promener,:nourrir, :garder,:userID)');
            // if (isset($_POST['promener'])){
            $preparedRequest2->bindValue('promener', $_POST['promener'], PDO::PARAM_BOOL);
            // }

            // if (isset($_POST['nourrir'])){
            $preparedRequest2->bindValue('nourrir', $_POST['nourrir'], PDO::PARAM_BOOL);
            // }
            // if (isset($_POST['garder'])){
            $preparedRequest2->bindValue('garder', $_POST['garder'], PDO::PARAM_BOOL);
            // }
            $preparedRequest2->bindValue('userID', $userID, PDO::PARAM_INT);
            $preparedRequest2->execute();
            header('Location: connexion.php');
            require_once('close.php');
        } else {
            // Si ce n'est pas valide, rien ne se passe 
        }
    } else {
        // Si pas de post encore
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

    <title>S'inscrire — Petsitter</title>
    <link href="/style/formulaire.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./_nav/navigation.php') ?>
    <form method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-3">&nbsp;</div>

                <div class="col-7">
                    <h3 class="font_raleway_regular_25px">Rejoins la famille des Petsitter</h3>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-4">
                            <label for="nom">Nom*</label><br />
                            <input type="text" name="nom" placeholder="nom" class="champs" value="<?php if (isset($nom)) echo $nom; ?>" required>
                            <?php if (isset($err_nom)) {
                                echo $err_nom;
                            } ?>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <label for="prenom">Prénom*</label><br />
                            <input type="text" name="prenom" id="prenom" placeholder="prenom" class="champs" value="<?php if (isset($prenom)) echo $prenom; ?>" required>
                            <?php if (isset($err_prenom)) {
                                echo $err_prenom;
                            } ?>
                        </div>
                    </div>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label for="naissance">Date de naissance*</label><br />
                            <input type="text" name="naissance" id="naissance" placeholder="naissance" class="champs full" value="<?php if (isset($naissance)) echo $naissance; ?>">
                            <?php if (isset($err_naissance)) {
                                echo $err_naissance;
                            } ?>
                        </div>
                    </div>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label for="telephone">Telephone*</label><br />
                            <input type="text" name="telephone" placeholder="telephone" class="champs full" id="telephone" value="<?php if (isset($telephone)) echo $telephone; ?>" required>
                            <?php if (isset($err_telephone)) {
                                echo $err_telephone;
                            } ?>
                        </div>
                    </div>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label for="mail">Email*</label><br />
                            <input type="email" id="mail" name="mail" placeholder="mail" class="champs full" value="<?php if (isset($mail)) echo $mail; ?>" required>
                            <?php if (isset($err_mail)) {
                                echo $err_mail;
                            } ?>
                        </div>
                    </div>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <!-- <label for="mdp">Mot de passe*</label><br />
                            <input type="password" class="box-input" name="password" placeholder="Mot de passe" required /> -->


                            <input type="password" name="mdp" id="mdp" placeholder="Mot de Passe" class="champs full" required>
                        </div>
                    </div>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-4">
                            <label for="pays">Pays*</label><br />
                            <input type="text" name="pays" placeholder="pays" class="champs" value="<?php if (isset($pays)) echo $pays; ?>" required>
                            <?php if (isset($err_pays)) {
                                echo $err_pays;
                            } ?>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <label for="ville">Ville*</label><br />
                            <input type="text" name="ville" id="ville" placeholder="ville" class="champs" value="<?php if (isset($ville)) echo $ville; ?>" required>
                            <?php if (isset($err_ville)) {
                                echo $err_ville;
                            } ?>
                        </div>
                    </div>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-4">
                            <label for="rue">Rue*</label><br />
                            <input type="text" name="rue" placeholder="rue" class="champs" value="<?php if (isset($rue)) echo $rue; ?>" required>
                            <?php if (isset($err_rue)) {
                                echo $err_rue;
                            } ?>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-4">
                            <label for="prenom">Code postal*</label><br />
                            <input type="text" name="postal" id="postal" placeholder="postal" class="champs" value="<?php if (isset($postal)) echo $postal; ?>" required>
                            <?php if (isset($err_postal)) {
                                echo $err_postal;
                            } ?>
                        </div>
                    </div>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label for="file">Photo de profil*</label><br />
                            <input type="file" name="file">
                           
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 font_raleway_regular_15px lightgrey_txt">
                            <p>Je souhaite...*</p>
                            <p>(plusieurs options sont posibles)</p>
                        </div>
                    </div>

                    <div class="row services">
                        <div class="font_raleway_regular_15px green_txt">
                            <div class="col-3">
                                <input type="checkbox" id="garder" name="garder" value="1">
                                <label for="garder">Garder</label>
                            </div>
                            <div class="col-3">
                                <input type="checkbox" id="nourrir" name="nourrir" value="1">
                                <label for="nourrir">Nourrir</label>
                            </div>
                            <div class="col-3">
                                <input type="checkbox" id="promener" name="promener" value="1">
                                <label for="promener">Promener</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <button type="submit" name="inscription" class="white_txt font_raleway_regular_15px">Je m'inscris</button>
                        </div>
                    </div>
                </div>

                <div class="col-2"></div>
            </div> <!-- /row -->
        </div> <!-- /container -->
    </form>



    <?php




    require_once('./_footer/footer.php')
    ?>
    <link href="style/datepicker.min.css" rel="stylesheet">
    <script src="script/datepicker-full.min.js"></script>
    <script>
        const elem = document.querySelector('#naissance')
        const datePicker = new Datepicker(elem, {
            format: 'dd/mm/yyyy'
        })
    </script>
</body>

</html>