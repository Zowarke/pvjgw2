<?php
include("Header.php");

$erreur = '';

if(isset($_POST['login']) && $_POST['login'] != '' && $_POST['password'] != '') // on test si un login et un mdp à été entré
{
	$login = $_POST['login']; // permet d'éviter l'injection de code SQL
	$pass = $_POST['password'];

	$reponse = $bdd->prepare('SELECT login_user, mail_user, password_user
					   		  FROM user
					   		  WHERE login_user = :login OR mail_user = :login');
	$reponse->execute(array(
		'login' => $login));
	$user = $reponse->fetch(); // on récupère le login et le mdp de l'utilisateur si celui ci est présent dans la base, sinon les variables sont vide

	$reponse->closeCursor();

	if($login == $user['login_user'] || $login == $user['mail_user']) // test de comparaison du login entré et celui présent dans la bdd (idem avec le mdp)
	{
		if($pass == $user['password_user'])
		{
			$_SESSION['connection'] = true; // si le test est un succès, on a connexion
			$_SESSION['login_user'] = $user['login_user']; // SESSION qui permettra de reperer quel joueur est connecté
			header('Location: accueilPartie.php'); // redirection vers le menu de jeu
		}
		else
		{
			$erreur = "pass"; // code erreur
		}
	}
	else
	{
		$erreur = "login";
	}
}
?>

<div class="welcome">
	<img class="panneau" src="Ressources/img/login.png">
	<div id="pLogin">
		<h2>Please login to continue !</h2>
		<form action="login.php" Method ="POST">
			<input type="text" name="login" placeholder="User Name or Email" autocomplete="off">
			<input type="password" name="password" placeholder="Password">
			<a class="back" href="acceuil.php">
				<img class="justBack" src="Ressources/img/back.png"><img class="backHover" src="Ressources/img/back_hover.png"><img class="backPush" src="Ressources/img/back_push.png">
			</a>
			<div id="log">
				<input type="submit" value="">
				<img id="justSub" src="Ressources/img/login_butt.png"><img id="subHover" src="Ressources/img/login_hover.png"><img id="subPush" src="Ressources/img/login_push.png">
			</div>
			<div id="errorLog">
				<?php
				if($erreur == 'pass') 
				{
					echo "Invalid Password.";
				}
				else if($erreur == 'login') 
				{
					echo "Invalid Login or Email.";
				}
				?>
			</div>
		</form>
	</div>
</div>

<?php
include("Footer.php")
?>