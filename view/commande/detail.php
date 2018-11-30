
<div id="detail_commande">


	<?php

		$idCommande = $c ->get('idCommande');
		$prixTotalCommande = $c ->get('prixTotalCommande');
		$adresseLivraisonCommande = $c ->get('adresseLivraisonCommande');
		$paiementFois= $c -> get('paiementFois');


	?>


	<h1> Détail de votre commande</h1>
	<a class="bouton" style="float:right;" href=<?php echo '"./index.php?action=readAll&controller=commande&codeUser=' . $_GET["codeCommande"] .'"' ?>>Retour à l'historique</a>

	<a>ID commande : <?php echo $idCommande ?></a>
	<br>
	<a>Commande livrée au : <?php echo $adresseLivraisonCommande ?></a>
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
	        	<a> <img src="./Images/'.$img_nom.'" > </a>

	        	<div class=desc>'

	        	 .$p->get('nomProduit').' 
	        	 <br> 
	        	 <a>Prix unitaire: ' . $p->get('prixProduit') . '€</a> 
	        	 <br>
	        	 <a>Quantité: ' . $tab_qté[$i] .'

	        	</div>
	        
	        </div>';

	         $i++;

	    }

	 ?>



	</div>

	<h3>TOTAL: <?php echo $prixTotalCommande ?> €</h3>

</div>


