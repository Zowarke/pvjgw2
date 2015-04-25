<?php
include("Header.php");
?>

<div id="Mmenu">
	<div class="welcome">
		<img class="panneau" src="Ressources/img/Menu.png">
		<div id="entour_menu">
			<a class="create_game" href="createGame.php">Create a game</a>
			<a id="taillecube" href="">
				<p>My<br>previous<br>games</p>
			</a>
			<a id="taillecube2" href="running_games.php">
				<p>My<br>running<br>games</p>
			</a>
			<a class="create_game" href="join_game.php">Join game</a>
		</div>
	</div>
</div>

<?php
include("footer.php");
?>