<?php

while($donnees = $reponse->fetch())
			{
				switch ($type_question)
				{
				case 'sexe':
					if($donnees['sexe'] == "homme")
					{
						$_SESSION['reponse'] = "Yes, it's a boy!";
						$_SESSION['juste-faux'] = "bonne_reponse";
					}
					else
					{

						$_SESSION['reponse'] = "No, it's a girl!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
					}
					
					break;
				case 'couleur_peau':
					if($donnees['peau'] == "blanc")
					{
						$_SESSION['reponse'] = "Yes, the character is white!";
						$_SESSION['juste-faux'] = "bonne_reponse";
				
					}
					else
					{
						$_SESSION['reponse'] = "No, the character is black!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
						
					}
					
					break;

					case 'lunette':
					if($donnees['lunette'] != NULL)
					{
						$_SESSION['reponse'] = "Yes, the character has got glasses!";
						$_SESSION['juste-faux'] = "bonne_reponse";	
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got glasses!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
					}
					break;

					case 'collier':
					if($donnees['collier'] != NULL)
					{
						$_SESSION['reponse'] = "Yes, the character has got a nucklace!";
						$_SESSION['juste-faux'] = "bonne_reponse";	
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got a nucklace!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
					}
					break;

					case 'moustache':
					if($donnees['moustache'] != NULL)
					{
						$_SESSION['reponse'] = "Yes, the character has got a mustache!";
						$_SESSION['juste-faux'] = "bonne_reponse";	
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got a mustache!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
					}
					break;

					case 'barbe':
					if($donnees['barbe'] != NULL)
					{
						$_SESSION['reponse'] = "Yes, the character has got a beard!";
						$_SESSION['juste-faux'] = "bonne_reponse";	
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got a beard!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
					}
					break;
					
					case 'noir':
					if($donnees['couleur_poil'] == "noir")
					{
						$_SESSION['reponse'] = "Yes, the character has black hairs!";
						$_SESSION['juste-faux'] = "bonne_reponse";
						
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got black hairs!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
						
					}
					break;
					case 'gris':
					if($donnees['couleur_poil'] == "gris")
					{
						$_SESSION['reponse'] = "Yes, the character has grey hairs!";
						$_SESSION['juste-faux'] = "bonne_reponse";
						
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got grey hairs!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
						
					}
					
					break;
					case 'blond':
					if($donnees['couleur_poil'] == "blond")
					{
						$_SESSION['reponse'] = "Yes, the character has blond hairs!";
						$_SESSION['juste-faux'] = "bonne_reponse";
						
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got blond hairs!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
					
					}
					
					break;
					case 'orange':
					if($donnees['couleur_poil'] == "orange")
					{
						$_SESSION['reponse'] = "Yes, the character has orange hairs!";
						$_SESSION['juste-faux'] = "bonne_reponse";
					
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got orange hairs!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
						
					}
					
					break;

					case 'haut_rouge':
					if($donnees['couleur_haut'] == "rouge")
					{
						$_SESSION['reponse'] = "Yes, the character has got a red top!";
						$_SESSION['juste-faux'] = "bonne_reponse";
						
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got a red top!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
					
					}
					break;
					case 'haut_gris':
					if($donnees['couleur_haut'] == "gris")
					{
						$_SESSION['reponse'] = "Yes, the character has got a grey top!";
						$_SESSION['juste-faux'] = "bonne_reponse";
						
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got a grey top!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
				
					}
					break;
					case 'haut_bleu':
					if($donnees['couleur_haut'] == 'bleu')
					{
						$_SESSION['reponse'] = "Yes, the character has got a blue top!";
						$_SESSION['juste-faux'] = "bonne_reponse";
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got a blue top!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
					}
					break;
					case 'haut_vert':
					if($donnees['couleur_haut'] == 'vert')
					{
						$_SESSION['reponse'] = "Yes, the character has got a green top!";
						$_SESSION['juste-faux'] = "bonne_reponse";
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got a green top!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
						
					}
					break;
					case 'haut_jaune':
					if($donnees['couleur_haut'] == 'orange')
					{
						$_SESSION['reponse'] = "Yes, the character has got a yellow top!";
						$_SESSION['juste-faux'] = "bonne_reponse";
					
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got a yellow top!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
						
					}
					break;
					case 'haut_noir':
					if($donnees['couleur_haut'] == 'noir')
					{
						$_SESSION['reponse'] = "Yes, the character has got a black top!";
						$_SESSION['juste-faux'] = "bonne_reponse";
					
					}
					else
					{
						$_SESSION['reponse'] = "No, the character hasn't got a black top!";
						$_SESSION['juste-faux'] = "mauvaise_reponse";
					
					}
					break;
					

				default:
					# code...
					break;
				}
			}
