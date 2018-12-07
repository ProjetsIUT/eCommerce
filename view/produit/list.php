<?php
if(Session::is_admin()){
    echo '<div class="panel_admin">

        <a class="bouton" href="index.php?controller=produit&action=create">Ajouter un produit</a>

    </div>';
}
?>

<h1> Tous nos produits </h1>

<?php
        $tab = unser
        ialize($_COOKIE["produits_panier"]);

        var_dump($tab);

        $test = "ok";
        array_push($tab,$test);

        setcookie("produits_panier",serialize($tab),time()+3600); //on dépose le cookie pour les produits du panier

        $tab = unserialize($_COOKIE["produits_panier"]);

        var_dump($tab);



?>

<div class=responsive>


<?php

    foreach ($tab_p as $p) {

        $img_nom = $p->get('nomProduit').'.png';
        $codeP = $p->get('codeProduit');
        echo '<div class=Produit> <a href="index.php?controller=produit&action=read&codeProduit='.rawurlencode($codeP).'">
         <img src="./Images/'.htmlspecialchars($img_nom).'" > 
        </a>
        <div class=desc>'.htmlspecialchars($p->get('nomProduit')).' <br> <a>Seulement  ' . htmlspecialchars($p->get('prixProduit')) . '€</a></div>
         </div>';
    }

 ?>



</div>

