<?php
include_once('./require.php');

if(!isset($_GET['id'])) {
	// no id in url, redirect home
	header('Location: index.php');
	exit;
}

$query = $DB->prepare('
	SELECT utilisateur.*, COUNT(annonce.id) AS nbAnnonces FROM utilisateur 
	JOIN annonce ON annonce.userID = utilisateur.id 
	WHERE utilisateur.id = :userid
');
$query->bindValue('userid', $_GET['id'], PDO::PARAM_INT);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);

if($result['id'] !== $_GET['id']) {
	// user doesn't exist, redirect home
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<?php
	require_once('./_head/meta.php');
	require_once('./_head/link.php');
	?>

	<title>Voir le profil de <?php echo $result['prenom'] . ' ' . $result['nom'] ?> — Petsitter</title>
	<link href="/style/profil-petsitter.css" rel="stylesheet">
</head>

<body>
	<?php require_once('./_nav/navigation.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-4 user ">
				<div>
					<img class="img-rond-75" src="./upload/<?php echo $result['photo'] ?>" style="margin-right:8px;">
				</div>

				<div>
					<h2 class="font_raleway_regular_25px"><?php echo $result['prenom'] . ' ' . $result['nom'] ?></h2>
					<p class="lightgrey_txt font_raleway_regular_15px"><img src="ressources/icon-place.svg" width="5%"> <?php echo $result['ville'] . ', ' . $result['pays'] ?></p>
					<p class="font_raleway_regular_15px">Note : 4,6/5</p>
				</div>
			</div>
			<div class="col-8">
				<div class="row">
					<div class="col-4">
						<p class="font_raleway_bigtitle_50px yellow_txt"><?php echo $result['nbAnnonces']; ?></p>
						<p class="font_raleway_regular_15px">gardes confiées</p>
					</div>
					<div class="col-4">
						<p class="font_raleway_bigtitle_50px yellow_txt">37</p>
						<p class="font_raleway_regular_15px">ajouts aux favoris</p>
					</div>
					<div class="col-4">
						<p class="font_raleway_bigtitle_50px yellow_txt">6</p>
						<p class="font_raleway_regular_15px">mois d'expérience</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div>
					<a href="mailto:<?php echo $result['mail'] ?>"><button class="white_txt font_raleway_regular_15px"> <img src="ressources/icon-send.svg" width="8%"> Envoyer un message</button></a>
					<button class="white_txt font_raleway_regular_15px"> <img src="ressources/icon-favoris.svg" width="8%"> Mettre en pet’favoris</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<span class="green_txt  font_raleway_regular_25px">À propos</span>
				<p class="font_raleway_regular_15px">Salut ! Je m’appelle <?php echo $result['prenom'] . ' ' . $result['nom'] ?>, <?php echo floor( (time() - $result['naissance']) / 31556926 ) // 31556926 = nb of seconds in a year ?> ans et d’origine française. J’aime me promener dans les parcs. Les animaux ont toujours eu une grande place dans ma vie. En effet, issue d’une grande famille nous avions beaucoup d’animaux ! Sérieuse, volontaire, dynamique et sociable, vous pouvez me laisser vos animaux en toute sérénité car je saurai veiller à leur bien-être comme si c'était les miens. Très touchée par la cause animale, je suis la personne idéale à qui confier son animal de compagnie.</p>
			</div>
		<?php 
		// Je récupére le nombre d'annonce poster
		$query = $DB->prepare('
			SELECT utilisateur.*, COUNT(annonce.id) AS nbAnnonces FROM utilisateur 
			JOIN annonce ON annonce.userID = utilisateur.id 
			WHERE utilisateur.id = :userid
		');
		$query->bindValue('userid', $_GET['id'], PDO::PARAM_INT);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
			$infoRecherche = $query->fetchAll(PDO::FETCH_ASSOC);
			
		foreach($commentaire as $info){
			$commentaire_Du_profils = ['userID'];
			$petCom= "SELECT nom, prenom, photo,commentaire FROM commentaires 
			LEFT JOIN utilisateur ON commentaires.petsitterID = utilisateur.id";
			$annonceInfo = $DB->prepare($petCom);
			$annonceInfo->execute();
			$annonce = $annonceInfo->fetch(PDO::FETCH_ASSOC);
		?>
	<div class="col-12">
	<div class="commentaires">
		<div class="box-commentaires">
			<div class="col-3-sm">
				<img class="img-rond-75" src="./upload/<?php echo $annonce['photo'] ?>" style="margin-right:8px;">
				<span class="font_raleway_regular_15px lightgrey_txt"> <?php echo $annonce ['prenom'] ?></span>
			</div>
			<div class="col-9-sm">
				<span class="font_raleway_regular_15px "><?php echo $commentaire['commentaire'] ?></span>
			</div>
		</div>
	</div>
</div>

<?php
}
?>
					<div class="col-12">
						<a href="commentaire.php?id=<?=$_GET['id']?>">
							<button class="white_txt font_raleway_regular_15px">Ajouter un commentaire à ce petsitter</button>
						</a>
						<br><br>

						<span class="font_raleway_regular_15px" style="display: flex; align-items: center;"> <img src="ressources/icon-verify.svg" width="32px" style="margin-right: 10px;">a signé la charte des Petsitter</span><br/>
						<span class="font_raleway_regular_15px" style="display: flex; align-items: center;"> <img src="ressources/icon-petfavoris.svg" width="32px" style="margin-right: 10px">a reçu 57 pet’favoris</span>

					</div>
				
				</div>
				



			</div>
		</div>
	</div>


	<?php
	require_once('./_footer/footer.php');
	require_once('./_head/script.php');
	?>
</body>

</html>