<div id="panier">

	<h1>Mon Panier</h1>

	<div id="liste_articles">

		<?php

  		foreach ($tab_p as $p) {

	        $img_nom = $p->get('nomProduit').'.png';
	        $codeP = $p->get('codeProduit');
	        echo '<div class="produit_panier"> <a href="index.php?controller=produit&action=read&codeProduit='.rawurlencode($codeP).'">
	         <img src="./Images/'.$img_nom.'" > 
	        </a>
	        <div class=desc>'.$p->get('nomProduit').' <br> <a>Seulement  ' . $p->get('prixProduit') . '€</a></div>
	         </div>';
	   		 }

 		?>



	</div>

	<a class="bouton_panier">Passer la commande</a>




</div>