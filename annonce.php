<?php
include_once('./require.php');

if (!isset($_SESSION['id'])) {
    header('Location: connexion.php');
    exit;
}

$modifierAnnonce = false;
if (isset($_GET['id']) && isset($_SESSION['id'])) { // Create / Update (CRUD)
    $preparedRequest = $DB->prepare('SELECT * FROM annonce WHERE id = :id');
    $preparedRequest->bindValue('id', $_GET['id'], PDO::PARAM_INT);
    $preparedRequest->execute();

    $data = $preparedRequest->fetch();

    if ($data['userID'] == $_SESSION['id']) {
        // session is the author of the annonce
        $modifierAnnonce = true;

        if (!empty($_POST)) {
            $preparedRequest = $DB->prepare('UPDATE annonce SET horaire = :horaire, startDate = :startDate, endDate = :endDate, note = :note, actif = :actif WHERE id = :id');

            $preparedRequest->bindValue('horaire', $_POST['horaire'], PDO::PARAM_INT);
            $preparedRequest->bindValue('startDate', strtotime(str_replace('/', '-', trim($_POST['startDate']))));
            $preparedRequest->bindValue('endDate', strtotime(str_replace('/', '-', trim($_POST['endDate']))));
            $preparedRequest->bindValue('note', $_POST['note'], PDO::PARAM_INT);
            $preparedRequest->bindValue('actif', $_POST['actif'], PDO::PARAM_BOOL);
            $preparedRequest->bindValue('id', $_GET['id'], PDO::PARAM_INT);

            extract($_POST);

            header('Location: voirAnnonce.php');
        } else {
            $horaire = $data['horaire'];
            $startDate = $data['startDate'];
            $endDate = $data['endDate'];
            $note = $data['note'];
            $actif = $data['actif'];
        }
    }
} else {
    if (!empty($_POST)) {
        if (isset($_POST['createAnnonce'])) {
            $preparedRequest = $DB->prepare('INSERT INTO annonce (horaire,startDate, endDate,note,actif,userID) VALUES (:horaire,:startDate, :endDate,:note,:actif,:userID)');

            $preparedRequest->bindValue('horaire', $_POST['horaire'], PDO::PARAM_INT);
            $preparedRequest->bindValue('startDate', strtotime(str_replace('/', '-', trim($_POST['startDate']))));
            $preparedRequest->bindValue('endDate', strtotime(str_replace('/', '-', trim($_POST['endDate']))));
            $preparedRequest->bindValue('note', $_POST['note'], PDO::PARAM_INT);
            $preparedRequest->bindValue('actif', $_POST['actif'], PDO::PARAM_BOOL);
            $preparedRequest->bindValue('userID', $_SESSION['id'], PDO::PARAM_INT);
            $preparedRequest->execute();

            $preparedRequest2 = $DB->prepare('INSERT INTO animaux (chien, chat, lapin, rongeur, furet, herisson, aquarium, oiseaux, reptiles, userID) VALUES (:chien, :chat, :lapin, :rongeur, :furet, :herisson, :aquarium, :oiseaux, :reptiles,  :userID)');
            if (isset($_POST['chien'])) {
                $preparedRequest2->bindValue('chien', $_POST['chien'], PDO::PARAM_BOOL);
            } else {

                $preparedRequest2->bindValue('chien', 0, PDO::PARAM_BOOL);
            }

            if (isset($_POST['chat'])) {
                $preparedRequest2->bindValue('chat', $_POST['chat'], PDO::PARAM_BOOL);
            } else {

                $preparedRequest2->bindValue('chat', 0, PDO::PARAM_BOOL);
            }

            if (isset($_POST['lapin'])) {
                $preparedRequest2->bindValue('lapin', $_POST['lapin'], PDO::PARAM_BOOL);
            } else {

                $preparedRequest2->bindValue('lapin', 0, PDO::PARAM_BOOL);
            }

            if (isset($_POST['rongeur'])) {
                $preparedRequest2->bindValue('rongeur', $_POST['rongeur'], PDO::PARAM_BOOL);
            } else {

                $preparedRequest2->bindValue('rongeur', 0, PDO::PARAM_BOOL);
            }

            if (isset($_POST['furet'])) {
                $preparedRequest2->bindValue('furet', $_POST['furet'], PDO::PARAM_BOOL);
            } else {

                $preparedRequest2->bindValue('furet', 0, PDO::PARAM_BOOL);
            }

            if (isset($_POST['herisson'])) {
                $preparedRequest2->bindValue('herisson', $_POST['herisson'], PDO::PARAM_BOOL);
            } else {

                $preparedRequest2->bindValue('herisson', 0, PDO::PARAM_BOOL);
            }

            if (isset($_POST['aquarium'])) {
                $preparedRequest2->bindValue('aquarium', $_POST['aquarium'], PDO::PARAM_BOOL);
            } else {

                $preparedRequest2->bindValue('aquarium', 0, PDO::PARAM_BOOL);
            }
            if (isset($_POST['oiseaux'])) {

                $preparedRequest2->bindValue('oiseaux', $_POST['oiseaux'], PDO::PARAM_BOOL);
            } else {

                $preparedRequest2->bindValue('oiseaux', 0, PDO::PARAM_BOOL);
            }

            if (isset($_POST['reptiles'])) {
                $preparedRequest2->bindValue('reptiles', $_POST['reptiles'], PDO::PARAM_BOOL);
            } else {

                $preparedRequest2->bindValue('reptiles', 0, PDO::PARAM_BOOL);
            }
            $preparedRequest2->bindValue('userID', $_SESSION['id'], PDO::PARAM_INT);
            $preparedRequest2->execute();

            header('Location: voirAnnonce.php');
        }
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

    <title>Créer une annonce — Petsitter</title>
    <link href="/style/formulaire.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./_nav/navigation.php') ?>

    <div class="container">
        <div class="row">
            <div class="col-3">&nbsp;</div>
            <div class="col-7">
                <?php
                if ($modifierAnnonce) :
                ?>
                    <h3 class="font_raleway_regular_25px">Je modifie mon annonce</h3>
                <?php
                else :
                ?>
                    <h3 class="font_raleway_regular_25px">Je crée mon annonce</h3>
                <?php
                endif;
                ?>

                <form method="post">
                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label id="horaire">Horaire</label><br />
                            <input type="text" name="horaire" id="horaire" placeholder="horaire" class="champs" value="<?php if (isset($horaire)) echo $horaire; ?>">
                        </div>
                    </div>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label for="startDate">Sur quelle période en avez-vous besoin ?</label>
                        </div>
                        <div id="range">
                            <div class="col-4">
                                <input type="text" name="startDate" id="startDate" class="champs" value="<?php if (isset($startDate)) echo $startDate; ?>">
                            </div>

                            <div class="col-1">
                                <span class="lightgrey_txt">à</span>
                            </div>

                            <div class="col-4">
                                <input type="text" name="endDate" class="champs" value="<?php if (isset($endDate)) echo $endDate; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label for="note">Score ?</label><br />
                            <input type="number" name="note" id="note" class="champs" value="<?php if (isset($note)) echo $note; ?>">
                        </div>
                    </div>

                    <div class="row services">
                        <div class="font_raleway_regular_15px green_txt">
                            <div class="col-12">
                                <input type="checkbox" id="actif" name="actif" value="1"  <?php if (isset($actif)) echo 'checked'; ?>>
                                <label for="actif">Annonce active ?</label>
                            </div>
                        </div>
                    </div>
                    <div class="row services">
                        <div class="font_raleway_regular_15px green_txt">
                            <div class="col-12 lightgrey_txt">                            
                                <label>Choisissez les animaux que vous pouvez garder :</label>
                            </div>
                            <div class="col-6">

                                <input type="checkbox" id="chien" name="chien" placeholder="chien" value="chien">
                                <label for="chien">Chien</label><br>

                                <input type="checkbox" id="chat" name="chat" placeholder="chat" value="chat">
                                <label for="chat">Chat</label><br>

                                <input type="checkbox" id="lapin" name="lapin" placeholder="lapin" value="lapin">
                                <label for="lapin">Lapin</label><br>

                                <input type="checkbox" id="rongeur" name="rongeur" placeholder="rongeur" value="rongeur">
                                <label for="rongeur">Rongeur</label><br>

                                <input type="checkbox" id="furet" name="furet" placeholder="furet" value="furet">
                                <label for="furet">Furet</label><br>
                            </div>
                            <div class="col-6">
                                <input type="checkbox" id="herisson" name="herisson" placeholder="herisson" value="herisson">
                                <label for="herisson">Hérisson</label><br>

                                <input type="checkbox" id="aquarium" name="aquarium" placeholder="aquarium" value="aquarium">
                                <label for="aquarium">Aquarium</label><br>

                                <input type="checkbox" id="oiseaux" name="oiseaux" placeholder="oiseaux" value="oiseaux">
                                <label for="oiseaux">Oiseaux</label><br>

                                <input type="checkbox" id="reptiles" name="reptiles" placeholder="reptiles" value="reptiles">
                                <label for="reptiles">Reptiles</label><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="font_raleway_regular_15px green_txt">
                            <div class="col-12">
                                <button type="submit" name="createAnnonce" class="white_txt font_raleway_regular_15px"><?php if($modifierAnnonce) { echo 'Modifie ton annonce'; } else { echo 'Crée ton annonce'; } ?></button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <?php
    require_once('./_footer/footer.php')
    ?>
    <link href="style/datepicker.min.css" rel="stylesheet">
    <script src="script/datepicker-full.min.js"></script>

    <script>
        const elem = document.querySelector('#range')
        const dateRangePicker = new DateRangePicker(elem, {
            format: 'dd/mm/yyyy'
        })
    </script>
</body>

</html>