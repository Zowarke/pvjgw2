<?php
session_start();
include("bdd.php");

$id_game = $_SESSION['id_game'];
$id_user = $_GET['id_user'];
$num_pers_joueur = rand(0,23);

for($i = 0; $i < 24; $i++)
{
	$barbe = null;
	$lunette = null;
	$moustache =null;
	$collier = null;
	$couleur_lunette = null;
	$couleur_poils = null;
	$couleur_peau = null;
	$couleur_haut = null;
	$yeux = null;
	
	$type_yeux = rand(1,7);
	$yeux = "oeils".$type_yeux;

	$tab_couleur_poils = array('noir', 'gris', 'orange', 'blond' );  //couleur des poils
	$num_couleur_poils = array_rand($tab_couleur_poils, 1);
	$couleur_poils = $tab_couleur_poils[$num_couleur_poils];

	$tab_couleur_haut = array('noir', 'rouge', 'bleu', 'gris', 'vert', 'orange');				//couleur du haut
	$num_couleur_haut = array_rand($tab_couleur_haut, 1);
	$couleur_haut = $tab_couleur_haut[$num_couleur_haut];

	$sex_cara = rand(0,1);
	$num_couleur_peau = rand(0,1);

	if($num_couleur_peau == 0)
	{
		$couleur_peau = "noir";
	}
	else
	{
		$couleur_peau = "blanc";
	}



	$avoir_lunette = rand(0,1);

	if($avoir_lunette == 1)
	{
		$tab_couleur_lunette = array('orange', 'jaune', 'vert', 'rouge', 'bleu', 'violet');
		$num_couleur_lunette = array_rand($tab_couleur_lunette, 1);
		$couleur_lunette = $tab_couleur_lunette[$num_couleur_lunette];
		
	}


	if($sex_cara == 0)
	{
		$sexe = "homme";
		$tab_prenom_homme = array('Léo', 'Paul', 'Antoine', 'Alexandre', 'Jonathan', 'Vincent', 'Pierre', 'Bastien', 'Florent', 'Rémi', 'Quentin', 'Alexis', 'Mael', 'Maxence', 'Timéo', 'Nolan', 'Sascha', 'Valentin', 'Romain', 'Mohamed', 'Rayan', 'Abdel', 'Edwin', 'Abdul');
		$nom = $tab_prenom_homme[$i];

		if($avoir_lunette == 1)
		{
			$lunette = "homme_lunette"."_".$couleur_lunette;
		}

			
		$avoir_barbe = rand(0,1);

		if($avoir_barbe == 1)
		{
			$type_barbe = rand(1,4);
			$barbe = "barbe_".$couleur_poils ."_". $type_barbe;
		}

		$avoir_moustache = rand(0,1);

		if($avoir_moustache == 1)
		{
			$type_moustache = rand(1,3);
			$moustache = "moustache_".$couleur_poils."_".$type_moustache;
		}


		
		$tab_type_haut = array('noeudpap', 'petitcolroule', 'groscolroule', 'pull', 'chemise', 'costumecravatte');
		$num_type_haut = array_rand($tab_type_haut, 1);
		$type_haut = $tab_type_haut[$num_type_haut];

		$haut = $type_haut."_".$couleur_haut;

		$tab_type_cheveux = array('mechecotegauche', 'mechecotedroit', 'pic', 'peucheveux', 'bol');
		$num_type_cheveux = array_rand($tab_type_cheveux,1);
		$type_cheveux = $tab_type_cheveux[$num_type_cheveux];

		$cheveux = "homme_".$type_cheveux."_".$couleur_poils;


	}


	else
	{
		$sexe = "femme";
		
		$tab_prenom_femme = array('Kenza', 'Alexia', 'Justine', 'Sarah', 'Olivia', 'Andréa', 'Clémentine', 'Enora', 'Alyssa', 'Mélanie', 'Julia', 'Victoire', 'Yasmine', 'Héloïse', 'Faustine', 'Mélina', 'Fanny', 'Alice', 'Marine', 'Victoria', 'Luna', 'Amandine', 'Audrey', 'Léana');
		$nom = $tab_prenom_femme[$i];
		$avoir_collier = rand(0,1);
		if($avoir_collier == 1)
		{
			$tab_couleur_collier = array('rouge', 'jaune', 'bleu', 'vert', 'rose');
			$num_couleur_collier = array_rand($tab_couleur_collier, 1);
			$couleur_collier = $tab_couleur_collier[$num_couleur_collier];
			$type_collier = rand(0,1);
			if($type_collier == 0)
			{
				$type_collier = "colliercourt";
			}
			else
			{
				$type_collier = "collierlong";
			}

			$collier = $type_collier."_".$couleur_collier;
		}


		if($avoir_lunette == 1)
		{
			$lunette = "femme_lunette"."_".$couleur_lunette;
		}

		$tab_type_cheveux = array('longlisse', 'longboucle', 'carre');
		$num_type_cheveux = array_rand($tab_type_cheveux,1);
		$type_cheveux = $tab_type_cheveux[$num_type_cheveux];

		$cheveux = "femme_".$type_cheveux."_".$couleur_poils;

		$tab_type_haut = array('petitcolroule', 'groscolroule', 'pull', 'costume');
		$num_type_haut = array_rand($tab_type_haut, 1);
		$type_haut = $tab_type_haut[$num_type_haut];

		$haut = $type_haut."_".$couleur_haut;
	}

	$req = $bdd->prepare('INSERT INTO pnj(id_game, id_user, nom, sexe, peau, couleur_poil, statut_character, barbe, moustache, couleur_haut, haut, cheveux, collier, lunette, yeux) VALUES (:id_game, :id_user, :nom, :sexe, :peau, :couleur_poil, :statut_character, :barbe, :moustache, :couleur_haut, :haut, :cheveux, :collier, :lunette, :yeux)');
	$req->execute(array(
			'id_game' => $id_game,
			'id_user' => $id_user,
			'nom' => $nom,
			'sexe' => $sexe,
			'peau' => $couleur_peau,
			'couleur_poil' => $couleur_poils,
			'statut_character' => true,
			'barbe' => $barbe,
			'moustache' => $moustache,
			'couleur_haut' => $couleur_haut,
			'haut' => $haut,
			"cheveux" => $cheveux,
			"collier" => $collier,
			"lunette" => $lunette,
			"yeux" => $yeux
			));
	
	if($i == $num_pers_joueur)
	{
		$req2 = $bdd->query("SELECT id_joueur2 FROM game WHERE id_game = '$id_game' ");
		$donnees = $req2->fetch();
			if($donnees['id_joueur2'] == "")
			{
				$req2 = $bdd ->query("UPDATE game SET prenom_pers_joueur1 = '$nom' WHERE id_game = '$id_game' ");
			}
			else
			{
				$req2 = $bdd ->query("UPDATE game SET prenom_pers_joueur2 = '$nom'  WHERE id_game = '$id_game' ");
			}	
	}
}

$reponse = $bdd->query("SELECT id_joueur2 FROM game WHERE id_game = '$id_game' ");
while($donnees = $reponse->fetch())
{
	if($donnees['id_joueur2'] == "")
	{
		header("Location: accueilPartie.php");
	}
	else
	{
		header("Location: game_play.php?id_game=$id_game");
	}
}



?>


