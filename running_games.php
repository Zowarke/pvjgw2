<?php
include("Header.php");
$login_user = $_SESSION['login_user'];
$reponse = $bdd->query("SELECT ID_game, game_title, type_game, id_joueur1, id_joueur2, AuTourDe FROM game WHERE id_joueur1 = '$login_user' OR id_joueur2 = '$login_user' ");
?>


<div class="welcome" id="background_running_games">


<div class="tableau">
	<TABLE class="classement_tableau">




		<TR class="haut_tableau">
			<TH>
				Name
			</TH>
			<TH>
				Type of game
			</TH>
			<TH>
				Opponent
			</TH>
			<TH>
				Turn
			</TH>

		</TR>

			<?php
			while($donnees = $reponse -> fetch())
			{
				?>
				<TR class="ligne_tableau">
					<TH>
						<?php
							echo($donnees['game_title']);
						?>
					</TH>
					<TH>
						<?php
						echo($donnees['type_game']);
						?>
					</TH>
					<TH>
						<?php
						if($login_user == $donnees['id_joueur1'])
						{
							echo($donnees['id_joueur2']);
						}
						
						else
						{
							echo($donnees['id_joueur1']);
						}
						if($donnees['id_joueur2'] == "")
						{
							?>
							<div class="no_one">
							<?php
							echo("No one for the moment");
							?>
							</div>
							<?php
						}
						?>
					</TH>
					<TH>
						<?php
						if($login_user == $donnees['AuTourDe'])
						{
							?>
							<a href="game_play.php?id_game=<?php echo($donnees['ID_game'])?>"><img src="Ressources/img/mine.png"></a>
							<?php
						}
						else if($donnees['id_joueur2'] == "")
						{
							?> <img src="Ressources/img/alone.png"> <?php
						}
						else
						{
							?> <a href="game_play.php?id_game=<?php echo($donnees['ID_game'])?>"><img src="Ressources/img/not_mine.png"></a> <?php
						}

						?>
					</TH>
				</TR>


				<?php
			}







			?>


		</TR>	



	</TABLE>


</div>


<a class="back_butt_login" id="back_rank" href="accueil_partie.php"><img  src="Ressources/img/back.png"></a>
</div>