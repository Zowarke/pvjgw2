<?php
session_start();
include("bdd.php");

$id_game = $_POST['game_title'];
$type_question = $_POST['question'];
$login_user = $_SESSION['login_user'];
$reponse = $bdd->query("SELECT id_joueur1, id_joueur2 FROM game WHERE id_game = '$id_game' ");
$donnees = $reponse->fetch();
if($login_user != $donnees['id_joueur1'])
{
	$AuTourDe = $donnees['id_joueur1'];
	$bdd->query("UPDATE game SET AuTourDe = '$AuTourDe' WHERE id_game = '$id_game' ");
	$reponse = $bdd->query("SELECT prenom_pers_joueur1 FROM game WHERE id_joueur2 = '$login_user' AND id_game = '$id_game' ");
	while($donnees = $reponse->fetch())
	{
			$prenom_pers_joueur = $donnees['prenom_pers_joueur1'];

			$reponse = $bdd -> query("SELECT * FROM pnj WHERE id_user != '$login_user' AND nom = '$prenom_pers_joueur' AND id_game = '$id_game'");
			include("elim_pers.php");
	}
	

	

}

else
{
	$AuTourDe = $donnees['id_joueur2'];
	$bdd->query("UPDATE game SET AuTourDe = '$AuTourDe' WHERE id_game = '$id_game' ");
	$reponse = $bdd->query("SELECT prenom_pers_joueur2 FROM game WHERE id_joueur1 = '$login_user' AND id_game = '$id_game' ");
	while($donnees = $reponse->fetch())
	{
		$prenom_pers_joueur = $donnees['prenom_pers_joueur2'];
			$reponse = $bdd -> query("SELECT * FROM pnj WHERE id_user != '$login_user' AND nom = '$prenom_pers_joueur' AND id_game = '$id_game'");
			include("elim_pers.php");
	}

}


header("Location: game_play.php?id_game=$id_game");