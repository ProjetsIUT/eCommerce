<?php

echo '<div class=responsive>';

    foreach ($tab_p as $p) {
        $img_nom = $p->get('nomProduit').'.png';
        echo '<div class=Produit> <a href="index.php?controller=produit&action=read&codeProduit="'.rawurlencode($p->get('codeProduit')).'">
         <img src="'.File::build_path(array('Images', $img_nom)).'" > 
        </a>
        <div class=desc>'.$p->get('nomProduit').' </div>
         </div>';
    }
echo '</div>'

?>