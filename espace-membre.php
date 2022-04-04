<?php
include_once('./require.php');

if (!isset($_SESSION['id'])) {
	// user not logged in
	header('Location: connexion.php');
	exit;
}

$query = $DB->prepare('
	SELECT * FROM annonce 
	WHERE userID = :userid
');
$query->bindValue('userid', $_SESSION['id'], PDO::PARAM_INT);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<?php
	require_once('./_head/meta.php');
	require_once('./_head/link.php');
	cla
	?>

	<title>Mon espace membre — Petsitter</title>
	<link href="/style/espace-petsitter.css" rel="stylesheet">
</head>

<body>
	<?php require_once('./_nav/navigation.php') ?>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="font_raleway_regular_25px">Bienvenue dans <span class="green_txt">ton espace </span> de Petsitter</h2>
				<p class="font_raleway_regular_15px">Ici, tu peux suivre toutes tes gardes en cours, ton historique et les informations relatives aux animaux que tu gardes.</p>
				<a href="annonce.php">
					<button class="white_txt font_raleway_regular_15px"> Créer une annonce</button>
				</a>
			</div>
			<div class="col-12 ">
				<h3 class=" green_txt font_raleway_regular_25px">Mes annonces en cours</h3>
				<p class="font_raleway_regular_15px">Si tu as le moindre problème, contacte le propriétaire. </p>
			</div>
			<?php
			foreach ($results as $annonce) {
		
				if (!$annonce['actif']) continue; // si l'annonce est inactive ça nous intéresse pas ici
			?>
				<div class="col-4 font_raleway_regular_15px box-info">
					<p style="font-weight: bold;"> INFORMATIONS UTILES</p>
					<p>ANIMAL : Chien </p> <!-- à faire plus tard -->
					<p>SERVICE : promener </p> <!-- à faire plus tard -->
					<p>DURÉE : du <?php echo date('d/m/Y', $annonce['startDate']) ?> au <?php echo date('d/m/Y', $annonce['endDate']) ?></p>
					<a href="annonce.php?id=<?=$annonce['id']?>">
						<button class="white_txt font_raleway_regular_15px"> Modifier une annonce</button><br><br>
					</a>
					<a class="lightgrey_txt" href="supprimer-annonce.php?id=<?php echo $annonce['id'] ?>">
						Clique ici pour supprimer ton annonce.
					</a>
				</div>
			<?php
			}
			?>

			<div class="col-12">
				<h3 class=" green_txt font_raleway_regular_25px">Historique de tes gardes</h3>
			</div>
			<?php
			foreach ($results as $annonce) {
				if ($annonce['actif']) continue; // si l'annonce est active ça nous intéresse pas ici
			?>
				<div class="col-4 font_raleway_regular_15px box-info">
					<p style="font-weight: bold;"> GARDE TERMINÉE</p>
					<p>ANIMAL : lapin </p> <!-- à faire plus tard -->
					<p>SERVICE : garde, nourrir, proemenr </p> <!-- à faire plus tard -->
					<p>DURÉE : du <?php echo date('d/m/Y', $annonce['startDate']) ?> au <?php echo date('d/m/Y', $annonce['endDate']) ?></p>
					<p>PROPRIÉTAIRE : Jean Dujardin</p> <!-- à faire plus tard -->
					<p>TÉLÉPHONE : 06 39 49 59 49</p> <!-- à faire plus tard -->
				</div>
			<?php
			}
			?>

		</div>

	</div>

	<?php
	require_once('./_footer/footer.php');
	require_once('./_head/script.php');
	?>
</body>

</html>