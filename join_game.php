<?php
include("Header.php");

$reponse = $bdd->query("SELECT game_title, type_game, id_joueur1, id_joueur2 FROM game WHERE id_joueur2 = '' ");

?>

<div class="welcome">
<img class="panneau" src="Ressources/img/join_game.png">
<div id="tableau">
	<table id="classementJoin">
		<tr id="enteteJoin">
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
		</tr>
			<?php
			while($donnees = $reponse -> fetch())
			{
				if($_SESSION['login_user'] <> $donnees['id_joueur1'])
				{
				?>
					<tr class="ligneTab">
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
					</tr>
				<?php
				}
			}
			?>
		</TR>	
	</table>
</div>
<p id="classback">
	<a class="back" href="accueilPartie.php">
	<img src="Ressources/img/back.png"><img class="backHover" src="Ressources/img/back_hover.png"><img class="backPush" src="Ressources/img/back_push.png">
</a></p>
<?php
include("footer.php");
?>