<?php
    foreach ($tab_p as $p) {
        echo '<a href="index.php?controller=produit&action=read&codeProduit="'.rawurlencode($p->get('codeProduit')).'">
        <div> <img href="'.File::build_path('Images', $p->get('nomProduit')).'"> '.$p->get('nomProduit').' </div>
        </a>';
    }
?>