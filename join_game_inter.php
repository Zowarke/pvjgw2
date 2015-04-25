<?php
include("bdd.php");
session_start();
$game_title = $_POST['game_title'];
$id_joueur2 = $_SESSION['login_user'];
$reponse = $bdd->query("SELECT ID_game FROM game WHERE game_title = '$game_title'");
while($donnees = $reponse->fetch())
{
	$id_game = $donnees['ID_game'];
}

$bdd->query("UPDATE game SET id_joueur2 = '$id_joueur2' WHERE game_title = '$game_title' ");
$bdd->query("UPDATE game SET statut_game = 1 WHERE game_title = '$game_title' ");
$bdd->query("UPDATE game SET AuTourDe = '$id_joueur2' WHERE game_title = '$game_title' ");

	header("Location: creationPersonnage.php?id_user=$id_joueur2&id_game=$id_game");

?>




