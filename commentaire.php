<?php
include_once('./require.php');

if (!isset($_SESSION['id'])) {
	// user not logged in
	header('Location: connexion.php');
	exit;
}





if (!empty($_POST)) {
    $preparedRequest = $DB->prepare('INSERT INTO commentaires (commentaire, userID, petsitterID) VALUES (:commentaire, :userID, :petsitterID)');

    $preparedRequest->bindValue('commentaire', $_POST['commentaire'], PDO::PARAM_STR);
    $preparedRequest->bindValue('userID', $_SESSION['id'], PDO::PARAM_INT);
    $preparedRequest->bindValue('petsitterID', $_GET['id'], PDO::PARAM_INT);
    $preparedRequest->execute();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<?php
	require_once('./_head/meta.php');
	require_once('./_head/link.php');
	?>

	<title>Mon espace membre — Petsitter</title>
	<link href="/style/espace-petsitter.css" rel="stylesheet">
    <link href="/style/formulaire.css" rel="stylesheet">
</head>

<body class="keepbottom">
	<?php require_once('./_nav/navigation.php') ?>
    <form method="post">
        <div class="container">
            <div class="row">
                <div class="font_raleway_regular_15px lightgrey_txt">
                    <div class="col-12">
                        <label for="commentaire">Écris un commentaire si tu as apprécié le service de ce petsitter !*</label><br />
                        <input type="text" name="commentaire" placeholder="commentaire" class="champs" value="<?php if (isset($commentaire)) echo $commentaire;?>" required>
                        <a href="annonce.php?id=<?php $_GET['id']?>"><button class="white_txt font_raleway_regular_15px">Publier le commentaire</button></a>
                    </div>
                </div>
                <!-- <textarea class= "commentaire" placeholder = "commentaire"> </textarea> -->
            </div>
        </div>
    </form>     

	<?php
        require_once('./_footer/footer.php');
        require_once('./_head/script.php');
	?>
</body>

</html>