<?php
include("Header.php");
$login_user = $_SESSION['login_user'];
$reponse = $bdd->query("SELECT ID_game, game_title, statut_game, type_game, id_joueur1, id_joueur2, AuTourDe, joueur_gagnant FROM game WHERE id_joueur1 = '$login_user' OR id_joueur2 = '$login_user' ");
?>

<div class="welcome">
	<img class="panneau" src="Ressources/img/ranking.png">
	<div id="tableau">
		<TABLE id="classement">
			<TR id="entete" class="running">
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
					<TR class="ligneTab rungames">
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
				$reponse->closeCursor();
				?>
		</TABLE>
		<p id="classback">
		<a class="back" href="acceuil.php">
			<img src="Ressources/img/back.png"><img class="backHover" src="Ressources/img/back_hover.png"><img class="backPush" src="Ressources/img/back_push.png">
		</a></p>
	</div>
</div>
	
<?php
include("footer.php");
?>