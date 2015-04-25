<?php
include("Header.php");
$id_game = $_GET['id_game'];
$login_user = $_SESSION['login_user'];
?>
<p>Your opponent is asking that!</p>
<?php
$reponse = $bdd->query("SELECT id_joueur1, id_joueur2 FROM game WHERE id_game = '$id_game' ");
$donnees = $reponse->fetch();
if($login_user == $donnees['id_joueur1'])
{
	$reponse2 = $bdd->query("SELECT question_joueur1 FROM game WHERE id_game = '$id_game'");
	$donnees2 = $reponse2->fetch();
	echo($donnees2['question_joueur1']);
}
else
{
	$reponse2 = $bdd->query("SELECT question_joueur2 FROM game WHERE id_game = '$id_game'");
	$donnees2 = $reponse2->fetch();
	echo($donnees2['question_joueur2']);
}
?>

<form action="reponse_question_inter.php" method="POST">
<input type='submit' name="reponse" value="Yes">
<input type='submit' name="reponse" value="No">
<input type='hidden' name="id_game" value="<?php echo($id_game); ?>">
</form>

//Afficher le personnage