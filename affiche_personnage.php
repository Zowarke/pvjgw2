<?php
	while($donnees = $reponse->fetch())
	{
		if($donnees['statut_character'] == 1)
		{
			$statut_pers = "en_jeu";
		}
		else
		{
			$statut_pers = "hors_jeu";
		}
		?>
			<div id="<?php echo($statut_pers); ?>" class="personnages">
				
					<img id = "peau" class="vetement" src="Ressources/personnages/<?php echo($donnees['peau']); ?>.png ">
					<img  id="yeux" class="vetement" src="Ressources/personnages/<?php echo($donnees['yeux']); ?>.png">
				<?php
				if($donnees['lunette'] != "")
				{
					?>	
					<img id = "lunette" class="vetement" src="Ressources/personnages/<?php echo($donnees['lunette']); ?>.png ">
					<?php
				}
					
			
				if($donnees['moustache'] != "")
				{
					?>
					
						<img id = "moustache" class="vetement" src="Ressources/personnages/<?php echo($donnees['moustache']); ?>.png ">
					
					<?php
				}
				?>
				
				
					<img id = "haut" class="vetement" src="Ressources/personnages/<?php echo($donnees['haut']); ?>.png ">
					<?php
				if($donnees['barbe'] != "")
				{
						?>
						<img id = "barbe" class="vetement" src="Ressources/personnages/<?php echo($donnees['barbe']); ?>.png ">
						<?php
				}
				if($donnees['sexe'] == "homme")
				{
					?>
				
					<img id = "cheveux_homme" class="vetement" src="Ressources/personnages/<?php echo($donnees['cheveux']); ?>.png ">
				
					<?php

				}
				else
				{
					?>
				
					<img id = "cheveux_femme" class="vetement" src="Ressources/personnages/<?php echo($donnees['cheveux']); ?>.png ">
				
					<?php	
				}
					
				if($donnees['collier'] != "")
				{
					?>
					
						<img id = "collier" class="vetement" src="Ressources/personnages/<?php echo($donnees['collier']); ?>.png ">
					
					<?php
				}

				?> <div class="prenom" > <?php echo($donnees['nom']); ?> </div>

				



				
			</div>
			<?php




		
	}
?>