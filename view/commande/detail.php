
<div id="detail_commande">


	<?php

		$idCommande = htmlspecialchars($c ->get('idCommande'));
		$prixTotalCommande = htmlspecialchars($c ->get('prixTotalCommande'));
		$adresseLivraisonCommande = htmlspecialchars($c ->get('adresseLivraisonCommande'));
		$paiementFois= htmlspecialchars($c -> get('paiementFois'));


	?>


	<h1> Détail de votre commande</h1>
	<a class="bouton" style="float:right;" href="./index.php?action=readAll&controller=commande">Retour à l'historique</a>

	<a>ID commande : <?php echo $idCommande ?></a>
	<br>
	<a>Commande livrée au : <?php echo $adresseLivraisonCommande ?></a>
	<br>
	<a>Commande payée en : <?php echo $paiementFois ?> fois</a>
	<br>
	<h3>Articles commandés:</h3>
	
	<div class=responsive>


	<?php


	    $i = 0;
	    foreach ($tab_p as $p) {

	        $img_nom = htmlspecialchars($p->get('nomProduit')).'.png';
	        $codeP = htmlspecialchars($p->get('codeProduit'));

	        echo '

	        <div class=Produit> 
	        	<a> <img src="./Images/'.$img_nom.'" > </a>

	        	<div class=desc>

	        	 <a>'.htmlspecialchars($p->get('nomProduit')).'</a> 
	        	 <br> 
	        	 <a>Prix unitaire: ' . htmlspecialchars($p->get('prixProduit')) . '€</a> 
	        	 <br>
	        	 <a>Quantité: ' . $tab_qte[$i] .'</a>

	        	</div>
	        
	        </div>';

	         $i++;

	    }

	 ?>



	</div>

	<h3>TOTAL: <?php echo $prixTotalCommande ?> €</h3>

</div>


