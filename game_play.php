<?php
include("Header.php");
$id_game = $_GET['id_game'];
$login_user = $_SESSION['login_user'];
$prenom_pers_joueur = "";
$reponse = $bdd->query("SELECT joueur_gagnant FROM game WHERE id_game = '$id_game'");
$donnees = $reponse->fetch();
$joueur_gagnant = $donnees['joueur_gagnant'];
if($joueur_gagnant == "")
{
	$reponse = $bdd->query("SELECT id_joueur1, id_joueur2 FROM game WHERE id_game = '$id_game' ");
	$donnees = $reponse->fetch();
?>
<div class="background_personnage">
	<div class="encadre_personnage">
		<?php
		if($donnees['id_joueur1'] == $login_user)
		{

			$joueur_adverse = $donnees['id_joueur2'];
			$reponse = $bdd->query("SELECT * FROM pnj WHERE id_game = '$id_game' AND id_user = '$joueur_adverse' "); //affiche la palette de personnage du joueur adverse
			include("affiche_personnage.php");
			if(isset($_SESSION['reponse']))
			{
				
				$class=$_SESSION['juste-faux'];
				?> <div class="<?php echo($class);?>"> <?php
				echo ($_SESSION['reponse']);
				unset($_SESSION['reponse']);
				?> </div><?php
			}
			$reponse = $bdd->query("SELECT prenom_pers_joueur1 FROM game WHERE id_joueur1 = '$login_user' AND id_game='$id_game'  "); //récupère le nom du personnage choisi au hasard
			$donnees = $reponse->fetch();
			$prenom_pers_joueur = $donnees['prenom_pers_joueur1'];
			$reponse = $bdd -> query("SELECT * FROM pnj WHERE id_user = '$login_user' AND nom = '$prenom_pers_joueur' AND id_game='$id_game' "); //affiche ce personnage
			$reponse2 = $bdd->query("SELECT count(ID_character) AS somme FROM pnj WHERE statut_character = 1 AND id_game = '$id_game' AND id_user != '$login_user'");
			while($donnees2 = $reponse2->fetch())
			{
				if($donnees2['somme'] == 1)
				{
					$reponse3 = $bdd->query("SELECT nom FROM pnj WHERE statut_character = 1 AND id_game = '$id_game' AND id_user != '$login_user'");
					$donnees3 = $reponse3->fetch();
					$prenom_dernier_pers = $donnees3['nom'];
					$reponse4 = $bdd->query("SELECT prenom_pers_joueur2 FROM game WHERE id_joueur1 = '$login_user' AND id_game='$id_game'  ");
					$donnees4 = $reponse4->fetch();
					$prenom_joueur1_test = $donnees4['prenom_pers_joueur2'];
					if($prenom_dernier_pers == $prenom_joueur1_test)
					{
						$reponse = $bdd->query("SELECT id_joueur2 FROM game WHERE id_game ='$id_game'");
						$donnees = $reponse->fetch();
						$id_joueur2 = $donnees['id_joueur2'];
						$bdd->query("UPDATE game SET AuTourDe = '$id_joueur2' AND joueur_gagnant = '$login_user' WHERE id_game = '$id_game'");
						?><div class="partie_gagnee"><?php
						echo("CONGRATLATION! You won the game! :D");
						?></div>
						<div class="info_partie_gagnee">
							<p>Your statistics will be updated right now. Continue like that and you'll be the best player EVER !</p>
						</div>
						<div class="lien_partie_gagnee">
						<a href="partieGagnee.php?type=rang&amp;id_game=<?php echo($id_game); ?>">Check my ranking!</a>
						<a href="partieGagnee.php?type=menu&amp;id_game=<?php echo($id_game); ?>">Back to main menu</a>
						</div>
						<?php
						
					}
					else
					{
						?><div class="partie_perdue"><?php
						echo("Sorry, that's not the good character... :'( You lost! ");
						echo("You had to found ");
						echo( $prenom_joueur1_test);
						?></div><?php
					}
					
				}
			}
			
			
		}
		else
		{
			$joueur_adverse = $donnees['id_joueur1'];
			$reponse = $bdd->query("SELECT * FROM pnj WHERE id_game = '$id_game' AND id_user = '$joueur_adverse'  ");
			include("affiche_personnage.php");
			if(isset($_SESSION['reponse']))
			{
				$class = $_SESSION['juste-faux'];
				?> <div class="<?php echo($class);?>"><?php
				echo ($_SESSION['reponse']);
				unset($_SESSION['reponse']);
				?> </div><?php
			}
			$reponse = $bdd->query("SELECT prenom_pers_joueur2 FROM game WHERE id_joueur2 = '$login_user' AND id_game='$id_game' ");
			$donnees = $reponse->fetch();
			$prenom_pers_joueur = $donnees['prenom_pers_joueur2'];
			$reponse = $bdd -> query("SELECT * FROM pnj WHERE id_user = '$login_user' AND nom = '$prenom_pers_joueur' AND id_game='$id_game'  ");
			$reponse2 = $bdd->query("SELECT count(ID_character) AS somme FROM pnj WHERE statut_character = 1 AND id_game = '$id_game' AND id_user != '$login_user'");
			while($donnees2 = $reponse2->fetch())
			{
				if($donnees2['somme'] == 1)
				{
					$reponse3 = $bdd->query("SELECT nom FROM pnj WHERE statut_character = 1 AND id_game = '$id_game' AND id_user != '$login_user'");
					$donnees3 = $reponse3->fetch();
					$prenom_dernier_pers = $donnees3['nom'];
					$reponse4 = $bdd->query("SELECT prenom_pers_joueur1 FROM game WHERE id_joueur2 = '$login_user' AND id_game='$id_game'  ");
					$donnees4 = $reponse4->fetch();
					$prenom_joueur2_test = $donnees4['prenom_pers_joueur1'];
					if($prenom_dernier_pers == $prenom_joueur2_test)
					{
						$reponse = $bdd->query("SELECT id_joueur1 FROM game WHERE id_game ='$id_game'");
						$donnees = $reponse->fetch();
						$id_joueur1 = $donnees['id_joueur1'];
						$bdd->query("UPDATE game SET AuTourDe = '$id_joueur1' AND joueur_gagnant = '$login_user' WHERE id_game = '$id_game'");
						?><div class="partie_gagnee"><?php
						echo("CONGRATLATION! You won the game! :D");
						?></div>
						<div class="info_partie_gagnee">
							<p>Your statistics will be updated right now. Continue like that and you'll be the best player EVER !</p>
						</div>
						<div class="lien_partie_gagnee">
						<a href="partieGagnee.php?type=rang&amp;id_game=<?php echo($id_game); ?>">Check my ranking!</a>
						<a href="partieGagnee.php?type=menu&amp;id_game=<?php echo($id_game); ?>">Back to main menu</a>
						</div>
						<?php
						
					}
					else
					{
						?><div class="partie_perdue"><?php
						echo("Sorry, that's not the good character... :'( You lost! ");
						echo("You had to found ");
						echo( $prenom_joueur2_test);
						?></div><?php
					}
					
				}
			}

			
			
		}
			$reponse2 = $bdd->query("SELECT joueur_gagnant FROM game WHERE id_game='$id_game'");
			$donnees2 = $reponse2->fetch();
			if($donnees2['joueur_gagnant'] == "")
			{
		?>
					 <div class="pers_joueur">
					 <p>Your opponent has to find this person!</p> <?php
					include("affiche_personnage.php");
					?> </div><?php
					$reponse = $bdd->query("SELECT AuTourDe FROM game WHERE id_game = '$id_game' ");
				$donnees = $reponse->fetch();
				if($donnees['AuTourDe'] == $login_user)
				{
					?>
					<div id="createGame">
					<form id="create" action = "game_play_inter.php" method="POST">
					<input type="hidden" name = "game_title" value = <?php echo($id_game); ?>>
					<p style="margin-bottom:0px; margin-top:0px;"> Questions you can ask to your opponent!</p>
					<div class="radiogameplay radio2">
						<p> Body questions </p>
						<input type="radio" name="question" value="couleur_peau" required="required" /><label> Does the character has a white skin?</label><br>
						<input type="radio" name="question" value="sexe" /><label> Is it a boy?</label>
					</div>
					<div class="radiogameplay radio2">
						<p> Hairs questions </p>
						<input type="radio" name="question" value="noir" /><label> Has he/she got black hairs?</label><br>
						<input type="radio" name="question" value="gris" /><label> Has he/she got grey hairs?</label><br>
						<input type="radio" name="question" value="blond" /><label> Has he/she got blond hairs?</label><br>
						<input type="radio" name="question" value="orange" /><label> Has he/she got orange hairs?</label>
					</div>
					<div class="radiogameplay radio2">
						<p> Clothes questions </p>
						<input type="radio" name="question" value="haut_rouge" /><label> Has he/she got a red top?</label><br>
						<input type="radio" name="question" value="haut_noir" /><label> Has he/she got black?</label><br>
						<input type="radio" name="question" value="haut_vert" /><label> Has he/she got a green top?</label><br>
						<input type="radio" name="question" value="haut_jaune" /><label> Has he/she got a yellow top?</label><br>
						<input type="radio" name="question" value="haut_bleu" /><label> Has he/she got blue top?</label><br>
						<input type="radio" name="question" value="haut_gris" /><label> Has he/she got a grey top?</label>
					</div>
					<div class="radiogameplay radio2">
						<p> Beard questions </p>
						<input type="radio" name="question" value="barbe" /><label> Has he got a beard?</label><br>
						<input type="radio" name="question" value="moustache" /><label> Has he got mustache?</label>
					</div>
					<div class="radiogameplay radio2">
						<p> Glasses questions </p>
						<input type="radio" name="question" value="lunette" /><label> Has he/she got glasses?</label><br>
						<input type="radio" name="question" value="collier" /><label> Has she got nucklace?</label><br>
					</div>
					<input type="text" name="name" placeholder="Have an idea?">
					<div id="creation">
						<input type="submit" value ="Ask!">
					</div>
				</form>
				</div>
					<?php
				}
			}

			
}

else
{
	header("Location: partiePerdue.php?id_game=$id_game");
}
?>

			



	</div>
	<a class="back_butt_login" id="back_gameplay" href="running_games.php"><img  src="Ressources/img/back.png"></a>
</div>

<?php
include('Footer.php');
?>




