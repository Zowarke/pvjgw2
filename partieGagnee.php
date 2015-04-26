<?php
session_start();
include("bdd.php");
$login_user = $_SESSION['login_user'];
$id_game = $_GET['id_game'];
$type = $_GET['type'];
$bdd->query("UPDATE game SET joueur_gagnant ='$login_user' WHERE id_game = '$id_game' ");
$reponse = $bdd->query("SELECT nbWin_user, nbPlayed_user, nbLoose_user FROM user WHERE login_user='$login_user'");
while($donnees = $reponse->fetch())
{
	$nbWin_user = $donnees['nbWin_user'];
	$nbPlayed_user = $donnees['nbPlayed_user'];
}
$nbPlayed_user++;
$nbWin_user++;
echo($nbPlayed_user);
echo($nbWin_user);
echo($login_user);
$bdd->query("UPDATE user SET nbWin_user = '$nbWin_user' AND nbPlayed_user = '$nbPlayed_user' WHERE login_user = '$login_user' ");

if($type == "rang")
{
	header("Location: ranking.php");
}
else
{
	header("Location: accueilPartie.php");
}
?>