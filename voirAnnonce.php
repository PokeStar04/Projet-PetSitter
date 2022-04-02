<?php
include_once('./require.php');


if (isset($_SESSION['id'])) {

    $var = 'Bonjour ' . $_SESSION['prenom'] .  $_SESSION['nom'];
} else {
    $var = 'Bonjour à tous';
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

    <title>Voir toutes les annonces — Petsitter</title>
    <link href="/style/resultats-style.css" rel="stylesheet">
    <link href="/style/formulaire.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./_nav/navigation.php') ?>

    <div class="container">
        <?php
        if (isset($_GET['recherche']) && !empty($_GET['recherche'])) {
            echo '<h1 class="font_raleway_regular_25px">Voici les résultats correspondants à <span class="green_txt">ta demande </span></h1>';
        } else {
            echo '<h1 class="font_raleway_regular_25px">Les annonces</h1>';
        }
        ?>

        <!-- <form method="get">
            <input type="search" name="recherche" class="champs" placeholder="nom">
            <input type="search" name="recherche2" placeholder="endDate ">
            <button type="submit" class="white_txt font_raleway_regular_15px">Rechercher</button>
        </form> -->

        <?php
        // récupérer les annonces actives
        $query = $DB->prepare('
            SELECT *, utilisateur.prenom, utilisateur.nom, utilisateur.photo, utilisateur.naissance FROM annonce 
            JOIN utilisateur ON utilisateur.id = annonce.userID
            JOIN garder ON garder.userID = annonce.userID
            WHERE actif IS TRUE
            ORDER BY annonce.id DESC
        ');
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $annonce){
        ?>

        <div class="row box font_raleway_regular_15px">
            <div class="col-1">
                <img src="<?php echo $annonce['photo'] ?>">
            </div>
            <div class="col-11 info-petsitter">
                <span class="yellow_txt"><?php echo $annonce['prenom'] ?>, <?php echo floor( (time() - $annonce['naissance']) / 31556926 ) // 31556926 = nb of seconds in a year ?> ans </span>
                <p>“J’adore les animaux depuis toute petite, petite c’était un zoo chez moi. Mais j’aime la compagnie de nos amis des animaux !” </p>
                <p>Possibilité de garder : chien, chat, lapin, rongeur</p>
                <p>Disponible du <?php echo date( 'd/m/Y', $annonce['startDate'] ) ?> au <?php echo date( 'd/m/Y', $annonce['endDate'] ) ?> à <?php echo $annonce['horaire'] ?>h pour <?php echo $annonce['garder'] ? 'garder, ' : null ?> <?php echo $annonce['nourrir'] ? 'nourrir, ' : null ?> <?php echo $annonce['promener'] ? 'promener' : null ?></p>
                <p class="lightgrey_txt">Tarif : 10€/jour</p>
                <p class="lightgrey_txt">Note : <?php echo $annonce['note'] ?>/5</p>
                <a href='profil.php?id=<?php echo $annonce['userID'] ?>'>
                    <button class="white_txt font_raleway_regular_15px">Consulter le profil</button>
                </a>


            </div>
        </div>

        <?php } ?>

    </div>


    <?php
    //  $sql = 'SELECT nom FROM `utilisateur`ORDER BY id DESC';
    //  $query = $DB->prepare($sql);
    //  $query->execute();
    //  $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //     echo '<pre>';
    //  var_dump($result);
    //     echo '</pre>';

    //    $recherche = $_GET['recherche'];
    //    echo $recherche;

    // $allAnnonce = $DB->query('SELECT nom FROM utilisateur ORDER BY id DESC');

    // $result = $DB->query("SELECT nom FROM utilisateur LIKE '%'.$recherche.'%'");
    // $result ->execute();

    // var_dump($result);

    // $recherche2 = htmlspecialchars($_GET['recherche2']);
    // $rechercheEndDate = $DB->query('SELECT endDate FROM annonce LIKE "%'.$recherche2.'%"');

    require_once('./_footer/footer.php');
    ?>
</body>

</html>