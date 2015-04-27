<?php
include("Header.php");

$reponse = $bdd->query("SELECT login_user, nbWin_user, nbPlayed_user,ratio_user
						FROM user 
						ORDER BY nbWin_user DESC, ratio_user DESC
						LIMIT 100");
$rank = 1;
?>

<div class="welcome">
	<img class="panneau" src="Ressources/img/ranking.png">
	<div id="tableau">
		<TABLE id="classement">
			<TR id="entete">
				<TH>
					Rank
				</TH>
				<TH>
					Name
				</TH>
				<TH>
					Matches played
				</TH>
				<TH>
					Matches won
				</TH>
				<TH>
					Ratio
				</TH>
			</TR>
				<?php
				while($donnees = $reponse -> fetch())
				{
					?>
					<TR class="ligneTab">
						<TH>
							<?php
								echo($rank);
							?>
						</TH>
						<TH>
							<?php
							echo($donnees['login_user']);
							?>
						</TH>
						<TH>
							<?php
							echo($donnees['nbWin_user']);
							?>
						</TH>
						<TH>
							<?php
							echo($donnees['nbPlayed_user']);
							?>
						</TH>
						<TH>
							<?php
							/*$ratio = round($donnees['nbWin_user'] / $donnees['nbPlayed_user'], 2);
							echo $ratio;*/
							echo($donnees['ratio_user']);
							$rank++;
							?>
						</TH>
					</TR>
					<?php
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