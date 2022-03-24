<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petsitter</title>
</head>

<body>
    <h1>Petsitter</h1>


    <form method="post">
        <input type="text" name="nom" placeholder="nom"><br />
        <input type="text" name="prenom" placeholder="prenom"><br />
        <input type="text" name="naissance" placeholder="naissance"><br />
        <input type="text" name="mail" placeholder="mail"><br />
        <input type="text" name="telephone" placeholder="telephone"><br />
        <input type="text" name="photo" placeholder="photo"><br />
        <input type="text" name="pays" placeholder="pays"><br />
        <input type="text" name="ville" placeholder="ville"><br />
        <input type="text" name="postal" placeholder="postal"><br />
        <input type="text" name="rue" placeholder="rue"><br />
        <input type="text" name="garder" placeholder="garder"><br />
        <input type="text" name="mdp" placeholder="mdp"><br />
        <button type="submit">Go !</button>





    </form>
    <?php

    $pdo = new PDO('mysql:host=127.0.0.1;dbname=petsitter', 'usrpetsiter', 'petpassword');

    if (!empty($_POST)) {

        $preparedRequest = $pdo->prepare('INSERT INTO utilisateur (nom, prenom,naissance,mail,telephone,photo,pays,ville,postal,rue,garder,mdp) VALUES (:nom,:prenom,:naissance,:mail,:telephone,:photo,:pays,:ville,:postal,:rue,:garder,:mdp)');
        $preparedRequest->bindValue('nom', $_POST['nom'], PDO::PARAM_INT);
        $preparedRequest->bindValue('prenom', $_POST['prenom'], PDO::PARAM_INT);
        $preparedRequest->bindValue('naissance', $_POST['naissance'], PDO::PARAM_INT);
        $preparedRequest->bindValue('mail', $_POST['mail'], PDO::PARAM_INT);
        $preparedRequest->bindValue('telephone', $_POST['telephone'], PDO::PARAM_INT);
        $preparedRequest->bindValue('photo', $_POST['photo'], PDO::PARAM_INT);
        $preparedRequest->bindValue('pays', $_POST['pays'], PDO::PARAM_INT);
        $preparedRequest->bindValue('ville', $_POST['ville'], PDO::PARAM_INT);
        $preparedRequest->bindValue('postal', $_POST['postal'], PDO::PARAM_INT);
        $preparedRequest->bindValue('rue', $_POST['rue'], PDO::PARAM_INT);
        $preparedRequest->bindValue('garder', $_POST['garder'], PDO::PARAM_INT);
        $preparedRequest->bindValue('mdp', $_POST['mdp'], PDO::PARAM_INT);
        $preparedRequest->execute();
    }

    ?>




</body>

</html>