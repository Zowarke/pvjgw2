<?php
include("Header.php");
$login_user = $_SESSION['login_user'];
$reponse = $bdd->query("SELECT ID_game, game_title, type_game, id_joueur1, id_joueur2, AuTourDe FROM game WHERE id_joueur1 = '$login_user' OR id_joueur2 = '$login_user' ");
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
					Turn
				</TH>
			</TR>
				<?php
				while($donnees = $reponse -> fetch())
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
				$reponse->closeCursor();
				?>
		</TABLE>
		<p id="classback">
		<a class="back" href="accueilPartie.php">
			<img src="Ressources/img/back.png"><img class="backHover" src="Ressources/img/back_hover.png"><img class="backPush" src="Ressources/img/back_push.png">
		</a></p>
	</div>
</div>
	
<?php
include("footer.php");
?>