<?php
include("Header.php");

$reponse = $bdd->query("SELECT game_title, type_game, id_joueur1, id_joueur2 FROM game WHERE id_joueur2 = '' ");

?>


<div class="welcome" id="background_join_games">

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
				Player 1
			</TH>
			<TH>
				Wanna join?
			</TH>

		</TR>

			<?php
			while($donnees = $reponse -> fetch())
			{
				if($_SESSION['login_user'] <> $donnees['id_joueur1'])
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
							echo($donnees['id_joueur1']);
							?>
						</TH>
						<TH>
							<form action="join_game_inter.php" method="POST">
								<input id="join_button" type="submit" value="">
								<input type="hidden" name = "game_title" value="<?php echo($donnees['game_title']);?>">
							</form>
						</TH>
						
					</TR>


				<?php
				}
			}







			?>


		</TR>	



	</TABLE>



</div>
<div>
<a class="back_butt_login" id="back_rank" href="accueil_partie.php"><img  src="Ressources/img/back.png"></a>
</div>
