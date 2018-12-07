<div class="panel_admin">
        <br>
        <a class="bouton_red" href=<?php echo ' "index.php?controller=produit&action=delete&codeProduit= ' . rawurlencode($p->get('codeProduit')). '"' ;?>> Supprimer ce produit</a>
        <a class="bouton" href=<?php echo ' "index.php?controller=produit&action=update&codeProduit='.rawurlencode($p->get('codeProduit')). '"' ;?>>Modifier ce produit</a>
</div>


<div class=presentation>

        <form id="myForm" method="get">

            <input type="hidden" name="panier" value="addToPanier" action="./index.php?controller=produit&action=ajoutPanier"/>
            <input type="hidden" name="codeProduit" value= <?php echo '"' . $p->get("codeProduit") . '"' ?>>


            <?php 

            if($valueStock==='Produit en rupture de stock'){  

                echo '<a class="bouton_panier_disabled" href="#">Ajouter au panier</a>';

            } else{

                echo '<a class="bouton_panier" onclick="document.getElementById(\'myForm\').submit()">Ajouter au panier</a>' ;
            }

            ?>

            <br>

            <p id="infos_prix_stock">
                <a id="prix_desc">Seulement <?php echo $p->get('prixProduit'); ?> €</a>
                <br>
                <a><?php echo $valueStock; ?> </a>
            <p>

       </form>

       <h1><?php echo $p->get('nomProduit') ?></h1> 

       <?php echo '<img src="./Images/'.$img_nom.'"' ;?>

       <br>
        
       <p><?php echo $p->get('descProduit') ?></p>


</div>

<div class="div_center">
    <a class="bouton" href="./index.php?action=readAll&controller=produit"> Retour à la liste des produits</a>
</div>     

    
     
