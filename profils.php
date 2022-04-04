<?php
include_once('./require.php');

if (!isset($_SESSION['id'])) {
	// user not logged in
	header('Location: connexion.php');
	exit;
}

// Je récupére les infos dans la table utilisateur
$i= $_SESSION['id'];
$userInfo = "SELECT prenom,nom,photo,pays,descript FROM utilisateur WHERE id = $i ";
$profilInfo = $DB->prepare($userInfo);
$profilInfo->execute();
$user = $profilInfo->fetch(PDO::FETCH_ASSOC);

// Je récupére les infos dans commentaires
$userCom = "SELECT commentaire, userID FROM commentaires WHERE petsitterID = $i ";
$profilCom = $DB->prepare($userCom);
$profilCom->execute();
$commentaire = $profilCom->fetch(PDO::FETCH_ASSOC);

// Je récupére les infos utilisateur qui corresponde à l'user id
// $e = $commentaire['userID'];
// $petCom = "SELECT nom,prenom,photos FROM utilisateur WHERE id = $e ";
// $postCom = $DB->prepare($petCom);
// $postCom->execute();
// $commentairePost = $postCom->fetch(PDO::FETCH_ASSOC);

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
	<link href="/style/chercher-annonce.css" rel="stylesheet">
	<link href="/style/profil-petsitter.css" rel="stylesheet">
</head>

<body>
	<?php require_once('./_nav/navigation.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-4 user ">
				<div>
					<img src="<?php echo $result['photo'] ?>" style="margin-right:8px;">
				</div>

				<div>
					<h2 class="font_raleway_regular_25px"><?php echo $user['prenom'] . ' ' . $user['nom'] ?></h2>
					<p class="lightgrey_txt font_raleway_regular_15px"><img src="ressources/icon-place.svg" width="5%"> <?php echo $user['nom'] . ', ' . $user['pays'] ?></p>
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
					<button class="white_txt font_raleway_regular_15px"> <img src="ressources/icon-favoris.svg" width="8%"> Mes pet’favoris</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<span class="green_txt  font_raleway_regular_25px">À propos</span>	
				<p class="font_raleway_regular_15px"> <?php echo $user['descript']//if ($user['descript'])=NULL ? echo $user['descript']  : jhbk?></p>
				<a href="edit_profils.php"><button class="white_txt font_raleway_regular_15px"> edit</button></a>
			</div>
			<span class="green_txt  font_raleway_regular_25px">Commentaires</span>
			<?php		// Je récupére le nombre d'annonce poster
		$query = $DB->prepare('
			SELECT utilisateur.*, COUNT(annonce.id) AS nbAnnonces FROM utilisateur 
			JOIN annonce ON annonce.userID = utilisateur.id 
			WHERE utilisateur.id = :userid
		');
		$query->bindValue('userid', $_GET['id'], PDO::PARAM_INT);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);



		//je créé mon tableau ou je stack les commentaires correspondant au profils

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
		</div>
		</br>
		<div>
			<span class="font_raleway_regular_15px" > <img src="ressources/icon-verify.svg" width="32px" style="margin-right: 10px;">a signé la charte des Petsitter</span><br/>
			<span class="font_raleway_regular_15px" > <img src="ressources/icon-petfavoris.svg" width="32px" style="margin-right: 10px">a reçu 57 pet’favoris</span>
		</div>
	</div>


	<?php
	require_once('./_footer/footer.php');
	require_once('./_head/script.php');
	?>
</body>

</html>