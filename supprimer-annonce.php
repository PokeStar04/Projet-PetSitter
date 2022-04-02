<?php
include_once('./require.php');

if (!isset($_SESSION['id'])) {
	// user not logged in
	header('Location: connexion.php');
	exit;
}

$query = $DB->prepare('SELECT * FROM annonce WHERE id = :id');
$query->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$query->execute();
$annonce = $query->fetch(PDO::FETCH_ASSOC);

if($annonce['userID'] == $_SESSION['id']) {
	$query = $DB->prepare('DELETE FROM annonce WHERE id = :id');
	$query->bindValue('id', $_GET['id'], PDO::PARAM_INT);
	$query->execute();
}

header('Location: espace-membre.php');
exit;
?>