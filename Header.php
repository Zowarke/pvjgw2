<!doctype html>
<?php
session_start(); //lancement de session

include("Fonction.php"); //integration de la page de focntion

if(isset($_GET['logout']))
{
	$_SESSION['connection'] = false;
	$_SESSION['login_user'] = '';
}

include("bdd.php");

?>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="Jeu par navigateur, reprend les grands principes de GuessWho"/>
		<link rel="stylesheet" type="text/css" href="GuessWho.css "/>
		<link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
		<title>GuessWho.com</title>
	</head>
	<body>
		<header>
			<img id="img_logo" src="Ressources/img/Logo_Guess_Who.png">
			<?php
			if(isset($_SESSION['connection']) && $_SESSION['connection'] == true) //test qui determine si un utilisateur est connecté ou non
			{
				$reponse = $bdd->query("SELECT COUNT(login_user) AS nbTot
										FROM user");
				$nbUser = $reponse->fetch(); // requête SQL pour avoir le nombre total de joueur
				$reponse->closeCursor();

				$reponse = $bdd->prepare("SELECT nbWin_user, nbPlayed_user, ratio_user
										  FROM user 
										  WHERE login_user = :user");
				$reponse->execute(array(
					'user' => $_SESSION['login_user'])); //Requête SQL pour récuperer des info a afficher sur le jouer (ex: nb parties gagnées/jouées, ratio)
				$info = $reponse->fetch();
				$reponse->closeCursor();

				$ratio = $info['ratio_user'];
				$win = $info['nbWin_user'];

				$reponse = $bdd->prepare("SELECT COUNT(login_user) AS classement
										  FROM user 
										  WHERE nbWin_user > :win");
				$reponse->execute(array(
					'win' => $win));
				$classement = $reponse->fetch(); //Requête SQL pour avoir le classement actuel
				$reponse->closeCursor();

				$rank = $classement['classement'];

				$reponse = $bdd->prepare("SELECT COUNT(login_user) AS classement
										  FROM user 
										  WHERE nbWin_user = :win AND ratio_user > :ratio");
				$reponse->execute(array(
					'win' => $win,
					'ratio'=> $ratio));
				$classementFin = $reponse->fetch(); //Requête SQL pour avoir le classement actuel
				$reponse->closeCursor();

				$rank += $classementFin['classement'] + 1;
				?>
				<p id="dec">Welcome <?php echo $_SESSION['login_user']; ?></p>
				<a id="deco" href="login.php?logout">
					<img src="Ressources/img/logout.png"><img id="logoutHover" src="Ressources/img/logout_hover.png"><img id="logoutPush" src="Ressources/img/logout_push.png">
				</a>

				<aside>
					<img src="Ressources/img/Aside.png">
					<p>rank : <?php echo $rank; ?> / <?php echo $nbUser['nbTot']; ?></p>
					<p>Played : <?php echo $info['nbPlayed_user']; ?></p>
					<p>Win : <?php echo $info['nbWin_user']; ?></p>
					<p>ratio : <?php echo $info['ratio_user']; ?></p>
					<a href="">consult my profile</a>
				</aside>
				<?php
			}
			?>
		</header>
		<section>