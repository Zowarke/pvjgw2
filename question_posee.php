<?php
include('Header.php');
$login_user = $_SESSION['login_user'];
$id_game = $_GET['id_game'];
echo('Your question has been ask to your opponent. Just wait for his answer! ;)');
$reponse = $bdd->query("SELECT id_joueur1, id_joueur2 FROM game WHERE id_game = '$id_game' ");
$donnees = $reponse->fetch();
if($login_user == $donnees['id_joueur1'])
{
	$bdd->query("UPDATE game SET question_posee_joueur1 = 1 WHERE id_joueur1 = '$login_user' AND id_game = '$id_game'");
}
else
{
	$bdd->query("UPDATE game SET question_posee_joueur2 = 1 WHERE id_joueur2 = '$login_user' AND id_game = '$id_game'");
}

?>
<a href="accueil_partie.php">Back to the menu</a>