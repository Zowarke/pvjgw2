<?php
include("Header.php");

$erreur = '';

if(isset($_POST['username']) && $_POST['username'] != '' && $_POST['pass'] != '' && $_POST['cPass'] != '' && $_POST['mail'] != '' ) //test pour qu'il n'y ait aucun champ vide
{
	$login = $_POST['username']; // permet d'éviter l'injection de code SQL
	$pass = $_POST['pass'];
	$cPass = $_POST['cPass'];
	$mail = $_POST['mail'];

	if($pass != $cPass) // test du mot de passe
	{
		$erreur = "mdp"; // différents = error + redirection
	}
	else // bon = insersion dans BDD + plus session connect true + redirection vers menu de jeu
	{
		$reponse = $bdd->prepare('SELECT COUNT(id_user) 
								  FROM user
								  WHERE login_user = :login OR mail_user = :mail');
		$reponse->execute(
			array(
			'login' => $login,
			'mail' => $mail));

		$nbconf = $reponse->fetchColumn();

		$reponse->closeCursor();

		if($nbconf == 0)
		{
			$req = $bdd->prepare('INSERT INTO user(login_user, password_user, mail_user, ratio_user) 
								  VALUES(:login, :pass, :mail, :base)');
			$req->execute(array(
				'login' => $login,
				'pass' => $pass,
				'mail' => $mail,
				'base' => "*N.R.*"));
			$req->closeCursor();
			$_SESSION['connection'] = true; // set connect true
			$_SESSION['login_user'] = $login;

			header("Location: accueilPartie.php"); //redirection
		}
		else
		{
			$erreur = "username";
		}
	}
}
else if(isset($_POST['username']))
{
	$erreur = "vide"; // si un des champ vide après validation du formulaire, session error
}
?>

<div id="cCompte">
	<div class="welcome">
		<img class="panneau" src="Ressources/img/compte.png">
		<div id="nCompte">
			<form id="formCompte" action="inscription.php" Method ="POST">
				<input type="text" name="username" placeholder="New login" autocomplete="off" minlength="4" maxlength="20" required="required">
				<input type="password" name="pass" placeholder="New password" minlength="5" maxlength="50" required="required">
				<input type="password" name="cPass" placeholder="Confirm password" minlength="5" maxlength="50" required="required"> 
				<input type="email" name="mail" placeholder="Email" autocomplete="off" required="required">
				<a class="back" href="acceuil.php">
					<img class="justBack" src="Ressources/img/back.png"><img class="backHover" src="Ressources/img/back_hover.png"><img class="backPush" src="Ressources/img/back_push.png">
				</a>
				<div>
					<input type="submit" value="">
					<img id="creaCompte" src="Ressources/img/create.png"><img id="compteHover" src="Ressources/img/create_hover.png"><img id="comptePush" src="Ressources/img/create_push.png">
				</div>
				<div id="error">
					<?php 
					if($erreur == 'username') 
					{
						echo "An error occured during registration, username or Email already taken !";
					}
					else if($erreur == 'mdp') 
					{
						echo "An error occured during registration, your passwords are different !";
					}
					else if($erreur == 'vide')
					{
						echo "An error occured during registration, text field empty !";
					}
					else if($erreur == '')
					{
						echo "";
					}
					?>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
include("Footer.php")
?>