
<?php

if(Session::is_admin()) {
    echo '<div class="panel_admin">
    <br>
    
    <a class="bouton_red" href="index.php?controller=produit&action=delete&codeProduit= ' . rawurlencode($p->get('codeProduit')). '"> Supprimer ce produit</a>
    <a class="bouton" href= "index.php?controller=produit&action=update&codeProduit='.rawurlencode($p->get('codeProduit')). '">Modifier ce produit</a>
    
    </div>';
}

?>

<div class=presentation>

        <form id="myForm" method="get">

            <input type="hidden" name="panier" value="addToPanier"/>
            <a class="bouton_panier" href="#" onclick="document.getElementById('myForm').submit()">Ajouter au panier</a>
            <br>

            <p id="infos_prix_stock">
                <a id="prix_desc">Seulement <?php echo htmlspecialchars($p->get('prixProduit')); ?> €</a>
                <br>
                <a><?php echo $valueStock; ?> </a>
            <p>

       </form>

       <h1><?php echo htmlspecialchars($p->get('nomProduit')) ?></h1> 

       <?php echo '<img src="./Images/'.$img_nom.'"' ;?>

       <br>
        
       <p><?php echo htmlspecialchars($p->get('descProduit')) ?></p>


</div>

<div class="div_center">
    <a class="bouton" href="./index.php?action=readAll&controller=produit"> Retour à la liste des produits</a>
</div>     

    
     
