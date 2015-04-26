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
		<table id="classement">
			<colgroup>
				<col span="5" width="1%"</col>
			</colgroup>
				<thead id="pclassement">
					<tr>
						<th>Rank</th>
						<th>Name</th>
						<th>Matches played</th>
						<th>Matches won</th>
						<th>Ratio</th>
					</tr>
				</thead>	
			</TR>
				<?php
				while($donnees = $reponse -> fetch())
				{
					?>
					<tbody>
						<tr id="lclassement">
							<td>
								<?php
								echo($rank);
								?>
							</td>
							<td>
								<?php
								echo($donnees['login_user']);
								?>
							</td>
							<td>
								<?php
								echo($donnees['nbWin_user']);
								?>
							</td>
							<td>
								<?php
								echo($donnees['nbPlayed_user']);
								?>
							</td>
							<td>
								<?php
								/*$ratio = round($donnees['nbWin_user'] / $donnees['nbPlayed_user'], 2);
								echo $ratio;*/
								echo($donnees['ratio_user']);
								$rank++;
								?>
							</td>
						</tr>
					</tbody>	
					<?php
				}
				$reponse->closeCursor();
				?>
		</table>
	</div>
	<a class="back" href="acceuil.php">
		<img src="Ressources/img/back.png"><img class="backHover" src="Ressources/img/back_hover.png"><img class="backPush" src="Ressources/img/back_push.png">
	</a>
</div>
	
<?php
include("footer.php");
?>