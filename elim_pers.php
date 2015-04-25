<?php
while($donnees = $reponse->fetch())
			{
				switch ($type_question)
				{
				case 'sexe':
					
					if($donnees['sexe'] == "homme")
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE sexe = 'femme' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE sexe = 'homme' AND id_game = '$id_game' AND id_user <> '$login_user' ");	
					}
					
					break;
				case 'glasses':
					if($donnees['lunette'] == NULL)
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE lunette <> NULL AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE lunette = NULL AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					break;
				case 'necklace':
					if($donnees['collier'] == NULL)
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE collier <> NULL AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE collier = NULL AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					break;
				case 'couleur_peau':
					if($donnees['peau'] == "blanc")
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE peau = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE peau = 'blanc' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					
					break;
					case 'noir':
					if($donnees['couleur_poil'] == "noir")
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'gris' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'blond' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'orange' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					break;
					case 'gris':
					if($donnees['couleur_poil'] == "gris")
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'blond' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'orange' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'gris' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					
					break;
					case 'blond':
					if($donnees['couleur_poil'] == "blond")
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'gris' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'orange' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'blond' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					
					break;
					case 'orange':
					if($donnees['couleur_poil'] == "orange")
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'gris' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'blond' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_poil = 'orange' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					
					break;

					case 'haut_rouge':
					if($donnees['couleur_haut'] == "rouge")
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'bleu' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'orange' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'vert' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'rouge' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					break;
					case 'haut_gris':
					if($donnees['couleur_haut'] == "gris")
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'bleu' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'orange' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'vert' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'rouge' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'gris' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					break;
					case 'haut_bleu':
					if($donnees['couleur_haut'] == 'bleu')
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'rouge' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'orange' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'vert' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'gris' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'bleu' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					break;
					case 'haut_vert':
					if($donnees['couleur_haut'] == 'vert')
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'bleu' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'orange' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'rouge' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'gris' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'vert' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					break;
					case 'haut_jaune':
					if($donnees['couleur_haut'] == 'orange')
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'bleu' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'rouge' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'vert' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'gris' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'orange' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					break;
					case 'haut_noir':
					if($donnees['couleur_haut'] == 'noir')
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'bleu' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'rouge' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'orange' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'vert' AND id_game = '$id_game' AND id_user <> '$login_user' ");
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'gris' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					else
					{
						$bdd->query("UPDATE pnj SET statut_character = 0 WHERE couleur_haut = 'noir' AND id_game = '$id_game' AND id_user <> '$login_user' ");
					}
					break;
					

				default:
					# code...
					break;
				}
			}