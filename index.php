<?php 
include("Header.php");

if(isset($_SESSION['connection']) && $_SESSION['connection'] == true) //si le joueur est connecté, il sera redirigé vers le menu de jeu
{
	header("Location: accueilPartie.php");
}
?>
	<div class="welcome">
		<img class="panneau" src="Ressources/img/welcome.png">
			<p id="textHaut">
			 	Welcome to Guess Who ! Through this game, you are going to play with your friends or against the computer. It will be a very funny experience for you and your family ! 
			</p>
			<div>
				<p>Just click the following button to continue </p>
				<a id="next" href="acceuil.php"><img id="justNext" src="Ressources/img/next.png"><img id="nextHover" src="Ressources/img/next_hover.png"><img id="nextPush" src="Ressources/img/next_push.png"></a>
			</div>
	</div>
<?php
include("Footer.php");
?>