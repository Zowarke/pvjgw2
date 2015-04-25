<?php
	include('Header.php');
?>

<div class="welcome">
	<img class="panneau" src="Ressources/img/rules.png">
	<div id="rules">
		<h3>Game overview</h3>
		<p>
			Guess Who is a board game where players have to find an hidden character. The first player to guess the others players characters win.
		</p>
		<h3>Game setup</h3>
		<p>
			Each players take their game board of 24 faces and places one of 24 mystery cards in the empty frame in each game board. This card represent the character your opponent has to guess and the character you have to answer questions about.
			The designated player goes first, beginning by asking the others players a characteristic found on one of their 24 visible characters (both players have the same 24 tiles). Example: “ Does your character have brown hair?”
			If they say, “yes,” the asking player flips over all of the characters without brown hair. If they say, “no,” the asking player flips over the characters that have brown hair. Through the process of elimination, players will eventually be able to “guess” the name of the </br> opponents character.
		</p>
		<h3>Winning the game</h3>
		<p id="rWin">
			Each players get one yes or no question per turn and may only guess (to win the game) once per game. If a player successfully guesses their opponents hidden character then they win; if their guess is wrong then they lose.
		</p>
	</div>
	<a class="back" href="acceuil.php"><img class="justBack" src="Ressources/img/back.png"><img class="backHover" src="Ressources/img/back_hover.png"><img class="backPush" src="Ressources/img/back_push.png"></a>
</div>

<?php
include("Footer.php");
?>