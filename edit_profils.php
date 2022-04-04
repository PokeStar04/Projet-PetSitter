<?php
include_once('./require.php');

if (!isset($_SESSION['id'])) {
	// user not logged in
	header('Location: connexion.php');
	exit;
}


if (isset($_POST)) {
    // $e = $_SESSION['id'];
    $preparedRequest = $DB->prepare('UPDATE utilisateur SET descript = :descript WHERE id = :id');
    $preparedRequest->bindValue('descript', $_POST['descript'], PDO::PARAM_STR);
    $preparedRequest->bindValue('id', $_SESSION['id'], PDO::PARAM_INT);
    $preparedRequest->execute();

    extract($_POST);
    
    
} else {
    $descript = $data['descript'];
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
    <link href="/style/footer.css" rel="stylesheet">
</head>

<body>
	<?php require_once('./_nav/navigation.php') ?>

    <div class="container">
    <form method="post">
      
            <div class="row">
                <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="row font_raleway_regular_15px lightgrey_txt">
                        <div class="col-12">
                            <label for="mdp">Description</label><br />
                            <input type="text" name="descript" id="descript" placeholder="descript" class="champs full" value="<?php if (isset($mdp)) echo $mdp; ?>" required>
                        </div>
                    </div>
                
            </div>
            <div class="row">
                <div class="col-12">
                   <a href="profils.php"><input type="submit" class="white_txt font_raleway_regular_15px"> Terminer</input></a>
                </div>

</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
    </div>
	</div>

    </form>   

	</div>
    <?php
    require_once('./_footer/footer.php');
    require_once('./_head/script.php');
    ?>


</body>

</html>
