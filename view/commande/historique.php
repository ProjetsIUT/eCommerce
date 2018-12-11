<h1><?php echo htmlspecialchars($pagetitle) ?></h1>

<div id="historique">


	<?php
		if(empty($tab_c)) {
			echo '<div class="div_center">
			<h2>Votre historique est vide !</h2>
			<a class="bouton" href="./">Commencer votre première commande sans plus attendre !</a> 
			</div>';
		}	
		else {

			foreach ($tab_c as $c) {

				echo '

				<div id="ligne_commande">

					<a>Commande N° ' . htmlspecialchars($c->get('idCommande')) . ' </a>

					<a>Passée le ' .htmlspecialchars($c->get('dateCommande')) . '</a>

					<a>Montant total: ' . htmlspecialchars($c->get('prixTotalCommande')) . '</a>

					<a class="bouton" href="./index.php?action=read&controller=commande&codeCommande='.htmlspecialchars($c->get('idCommande')). '">Détails</a>


				</div>

				<br>

				';
			}
		}


	?>



</div>