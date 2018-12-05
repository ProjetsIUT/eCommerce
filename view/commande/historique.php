<h1><?php echo $pagetitle ?></h1>

<div id="historique">


	<?php

		foreach ($tab_c as $c) {

			echo '

			<div id="ligne_commande">

				<a>Commande N° ' . $c->get('idCommande') . ' </a>

				<a>Passée le ' .$c->get('dateCommande') . '</a>

				<a>Montant total: ' . $c->get('prixTotalCommande') . '</a>

				<a class="bouton" href="./index.php?action=read&controller=commande&codeCommande='.$c->get('idCommande'). '">Détails</a>


			</div>

			<br>

			';
		}


	?>



</div>