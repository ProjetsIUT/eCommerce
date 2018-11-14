<?php
    foreach ($tab_p as $p) {
        echo '<a href="index.php?controller=produit&action=read&codeProduit="'.rawurlencode($p->get('codeProduit')).'">
        
        </a>';
    }
?>