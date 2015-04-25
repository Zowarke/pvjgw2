<?php
session_start();
include("bdd.php");
$reponse = $_POST['reponse'];
$id_game = $_POST['id_game'];
$login_user = $_SESSION['login_user'];
$reponse1 = $bdd->query("SELECT id_joueur1 FROM game WHERE id_game='$id_game' ");
$donnees = $reponse1->fetch();
if($donnees['id_joueur1'] == $login_user)
{
	if($reponse == "Yes")
	{
		$bdd->query("UPDATE game SET reponse_joueur1 = 'yes' WHERE id_game = '$id_game' ");
	}
	else
	{
		$bdd->query("UPDATE game SET reponse_joueur1 = 'no' WHERE id_game = '$id_game' ");
	}
	$bdd->query("UPDATE game SET question_posee_joueur2 = 0 WHERE id_game='$id_game' ");
	
}
else
{
	if($reponse == "Yes")
	{
		$bdd->query("UPDATE game SET reponse_joueur2 = 'yes' WHERE id_game = '$id_game' ");
	}
	else
	{
		$bdd->query("UPDATE game SET reponse_joueur2 = 'no' WHERE id_game = '$id_game' ");
	}
	$bdd->query("UPDATE game SET question_posee_joueur1 = 0 WHERE id_game='$id_game' ");
	
}

header("Location: game_play.php?id_game=$id_game");
