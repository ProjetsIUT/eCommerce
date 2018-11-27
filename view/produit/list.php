<?php

echo '<div class=responsive>';

    foreach ($tab_p as $p) {
        $img_nom = $p->get('nomProduit').'.png';
        $codeP = $p->get('codeProduit');
        echo '<div class=Produit> <a href="index.php?controller=produit&action=read&codeProduit='.rawurlencode($codeP).'">
         <img src="'.File::build_path(array('Images', $img_nom)).'" > 
        </a>
        <div class=desc>'.$p->get('nomProduit').' </div>
         </div>';
    }
echo '</div>';
echo '<p> <a href="index.php?controller=produit&action=create" style="color:black;text-align:center;"> Cliquez ici pour ajouter un nouveau produit </a> </p>';

?>