<?php
    echo '
    <div class=Produit>
        <div class=idetail> <img src="'.File::build_path(array('Images', $img_nom)).'" style="width:15%;height=15%;display: block;margin-left: auto;margin-right: auto;"> 
        </div>
        <div class=desc>
        <p>  '.$p->get('descProduit').' </p>
        <p> Prix : '.$p->get('prixProduit').' € </p>
        <p> '.$valueStock.' </p>
        <form method="get">
        <p> <input type="hidden" name="panier" value="addToPanier"/>
        <input type="submit" value="Ajouter à panier" style="display: block;margin-left: auto; margin-right: auto;"/>
        </p>
        </form>
        <p> <a href="index.php?controller=produit&action=delete&codeProduit='.rawurlencode($p->get('codeProduit')).'" style="color:black"> Cliquez ici pour supprimer ce produit ! </a> </p>
        <p> <a href="index.php?controller=produit&action=update&codeProduit='.rawurlencode($p->get('codeProduit')).'" style="color:black"> Cliquez ici pour modifier ce produit ! </a> </p>
        </div>
    </div>
';
?>