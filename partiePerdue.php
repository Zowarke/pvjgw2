<?php
include("header.php");
$login_user = $_SESSION['login_user'];
$id_game = $_GET['id_game'];
$bdd->query("UPDATE game SET statut_game = 0 WHERE id_game = '$id_game'");

$reponse = $bdd->query("SELECT nbPlayed_user, nbLoose_user FROM user WHERE login_user = '$login_user'");

while($donnees = $reponse->fetch())
{
	$nbLoose_joueur = $donnees['nbLoose_user'];
	$nbPlayed_joueur = $donnees['nbPlayed_user'];
}
$nbPlayed_joueur++;
$nbLoose_joueur++;
$bdd->query("UPDATE user SET nbPlayed_user = '$nbPlayed_joueur' AND nbLoose_user = '$nbLoose_joueur' WHERE login_user = '$login_user'");
?>

<p>Sorry you lost! You should be faster to win!</p>

<a href="ranking.php">Check my ranking</a>
<a href="accueilPartie.php">Back to main menu</a>