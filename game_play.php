<?php
include("Header.php");
$id_game = $_GET['id_game'];
$login_user = $_SESSION['login_user'];
$prenom_pers_joueur = "";
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
			$reponse = $bdd->query("SELECT prenom_pers_joueur1 FROM game WHERE id_joueur1 = '$login_user' AND id_game='$id_game'  "); //récupère le nom du personnage choisi au hasard
			$donnees = $reponse->fetch();
			$prenom_pers_joueur = $donnees['prenom_pers_joueur1'];
			$reponse = $bdd -> query("SELECT * FROM pnj WHERE id_user = '$login_user' AND nom = '$prenom_pers_joueur' AND id_game='$id_game' "); //affiche ce personnage
			
			
		}
		else
		{
			$joueur_adverse = $donnees['id_joueur1'];
			$reponse = $bdd->query("SELECT * FROM pnj WHERE id_game = '$id_game' AND id_user = '$joueur_adverse'  ");
			include("affiche_personnage.php");
			$reponse = $bdd->query("SELECT prenom_pers_joueur2 FROM game WHERE id_joueur2 = '$login_user' AND id_game='$id_game' ");
			$donnees = $reponse->fetch();
			$prenom_pers_joueur = $donnees['prenom_pers_joueur2'];
			$reponse = $bdd -> query("SELECT * FROM pnj WHERE id_user = '$login_user' AND nom = '$prenom_pers_joueur' AND id_game='$id_game'  ");
			
			
		}
		?>
			 <div class="pers_joueur">
			 <p>Your opponent has to find this person!</p> <?php
			include("affiche_personnage.php");
			?> </div>

			<?php
			$reponse = $bdd->query("SELECT AuTourDe FROM game WHERE id_game = '$id_game' ");
			$donnees = $reponse->fetch();
			if($donnees['AuTourDe'] == $login_user)
			{
				?><form class="question" action = "game_play_inter.php" method="POST">
				<input type="hidden" name = "game_title" value = <?php echo($id_game); ?>>
				<p> Questions you can ask to your opponent!</p>
				<div class="body_qestion">
					<p> Body questions </p>
					<input type="checkbox" name="question" value="couleur_peau" />Does the character has a white skin?<br>
					<input type="checkbox" name="question" value="sexe" />Is it a boy?<br>
				</div>
				<div class="hairs_question">
					<p> Hairs questions </p>
					<input type="checkbox" name="question" value="noir" />Has he/she got black hairs?<br>
					<input type="checkbox" name="question" value="gris" />Has he/she got grey hairs?<br>
					<input type="checkbox" name="question" value="blond" />Has he/she got blond hairs?<br>
					<input type="checkbox" name="question" value="orange" />Has he/she got orange hairs?<br>
				</div>
				<div class="clothe_question">
					<p> Clothes questions </p>
					<input type="checkbox" name="question" value="haut_rouge" />Has he/she got haut rouge?<br>
					<input type="checkbox" name="question" value="haut_noir" />Has he/she got haut noir?<br>
					<input type="checkbox" name="question" value="haut_vert" />Has he/she got haut vert?<br>
					<input type="checkbox" name="question" value="haut_jaune" />Has he/she got haut jaune?<br>
					<input type="checkbox" name="question" value="haut_bleu" />Has he/she got haut bleu?<br>
					<input type="checkbox" name="question" value="haut_gris" />Has he/she got haut gris?<br>
				</div>
				<div class="clothe_question">
					<p> Clothes questions </p>
					<input type="checkbox" name="question" value="haut_rouge" />Has he/she got haut rouge?<br>
					<input type="checkbox" name="question" value="haut_noir" />Has he/she got haut noir?<br>
					<input type="checkbox" name="question" value="haut_vert" />Has he/she got haut vert?<br>
					<input type="checkbox" name="question" value="haut_jaune" />Has he/she got haut jaune?<br>
					<input type="checkbox" name="question" value="haut_bleu" />Has he/she got haut bleu?<br>
				</div>
				<div class="clothe_question">
					<p> Clothes questions </p>
					<input type="checkbox" name="question" value="haut_rouge" />Has he/she got haut rouge?<br>
					<input type="checkbox" name="question" value="haut_noir" />Has he/she got haut noir?<br>
					<input type="checkbox" name="question" value="haut_vert" />Has he/she got haut vert?<br>
					<input type="checkbox" name="question" value="haut_jaune" />Has he/she got haut jaune?<br>
					<input type="checkbox" name="question" value="haut_bleu" />Has he/she got haut bleu?<br>
				</div>
				<div class="accessory_question">
					<p> Clothes questions </p>
					<input type="checkbox" name="question" value="glasses" />Has he/she got glasses?<br>
					<input type="checkbox" name="question" value="necklace" />Has he/she got necklace?<br>
					
				</div>
				<input type="text" name="name" placeholder="Have an idea?">
				<input type="submit" value ="Ask!">

			</form>


				<?php
			}
			?>

			



	</div>
	<a class="back_butt_login" id="back_gameplay" href="running_games.php"><img  src="Ressources/img/back.png"></a>
</div>




