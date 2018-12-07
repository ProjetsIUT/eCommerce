
<div id="detail_commande">


	<?php

		$idCommande = $c ->get('idCommande');
		$prixTotalCommande = $c ->get('prixTotalCommande');
		$adresseLivraisonCommande = $c ->get('adresseLivraisonCommande');
		$paiementFois= $c -> get('paiementFois');


	?>


	<h1> Détail de votre commande</h1>
	<a class="bouton" style="float:right;" href="./index.php?action=readAll&controller=commande">Retour à l'historique</a>

	<a>ID commande : <?php echo htmlspecialchars($idCommande) ?></a>
	<br>
	<a>Commande livrée au : <?php echo htmlspecialchars($adresseLivraisonCommande) ?></a>
	<br>
	<h3>Articles commandés:</h3>
	
	<div class=responsive>


	<?php

		$i=0;

	    foreach ($tab_p as $p) {

	        $img_nom = $p->get('nomProduit').'.png';
	        $codeP = $p->get('codeProduit');
	        echo '

	        <div class=Produit> 
	        	<a> <img src="./Images/'.htmlspecialchars($img_nom).'" > </a>

	        	<div class=desc>'

	        	 .htmlspecialchars($p->get('nomProduit')).' 
	        	 <br> 
	        	 <a>Prix unitaire: ' . htmlspecialchars($p->get('prixProduit')) . '€</a> 
	        	 <br>
	        	 <a>Quantité: ' . htmlspecialchars($tab_qté[$i]) .'

	        	</div>
	        
	        </div>';

	         $i++;

	    }

	 ?>



	</div>

	<h3>TOTAL: <?php echo htmlspecialchars($prixTotalCommande) ?> €</h3>

</div>


