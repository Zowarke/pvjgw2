<?php
include("Header.php");
$login_user = $_SESSION['login_user'];
$reponse = $bdd->query("SELECT ID_game, game_title, statut_game, type_game, id_joueur1, id_joueur2, AuTourDe, joueur_gagnant FROM game WHERE id_joueur1 = '$login_user' OR id_joueur2 = '$login_user' ");
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
				Winner
			</TH>

		</TR>

			<?php
			while($donnees = $reponse -> fetch())
			{
				if($donnees['statut_game'] == 0)
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
							?>
						</TH>
						<TH>
							<?php
								echo($donnees['joueur_gagnant']);
							?>
						</TH>
					</TR>


					<?php
				}
			}







			?>


		</TR>	



	</TABLE>


</div>


<a class="back_butt_login" id="back_rank" href="accueilPartie.php"><img  src="Ressources/img/back.png"></a>
</div>
