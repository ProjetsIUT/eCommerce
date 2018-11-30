<h1><?php echo $pagetitle ?></h1>

<div id="historique">


	<?php

		foreach ($tab_c as $c) {

			echo '

			<div id="ligne_commande">

				<a>Commande N° ' . $c->get('idCommande') . ' </a>

				<a>Passée le ' .$c->get('dateCommande') . '</a>

				<a>Montant total: ' . $c->get('prixTotalCommande') . '</a>


			</div>

			<br>

			';
		}


	?>



</div>