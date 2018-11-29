
<div class="panel_admin">

	<a class="bouton" href="index.php?controller=produit&action=create">Ajouter un produit</a>

</div>

<h1> Tous nos produits </h1>

<div class=responsive>


<?php

    foreach ($tab_p as $p) {

        $img_nom = $p->get('nomProduit').'.png';
        $codeP = $p->get('codeProduit');
        echo '<div class=Produit> <a href="index.php?controller=produit&action=read&codeProduit='.rawurlencode($codeP).'">
         <img src="./Images/'.$img_nom.'" > 
        </a>
        <div class=desc>'.$p->get('nomProduit').' <br> <a>Seulement  ' . $p->get('prixProduit') . '€</a></div>
         </div>';
    }

 ?>



</div>

