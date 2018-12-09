<div id="panier">

	<h1>Mon Panier</h1>

	<div class="responsive">

	
        <?php

                $tab= unserialize($_COOKIE["produits_panier"]);

         
               foreach ($tab as $tab_produit) {

                if($tab_produit!="null"){

                $p=ModelProduit::select($tab_produit[0]);
                $qté=$tab_produit[1];


                $img_nom = $p->get('nomProduit').'.png';
                $codeP = $p->get('codeProduit');
                echo '
                <div class=Produit> 
                    <a href="index.php?controller=produit&action=read&codeProduit='.rawurlencode($codeP).'">
                        <img src="./Images/'.htmlspecialchars($img_nom).'" > 
                    </a>

                    <div class=desc>'.htmlspecialchars($p->get('nomProduit')).' 
                     <br> 
                     <a>Seulement  ' . htmlspecialchars($p->get('prixProduit')) . '€</a>
                     <br>
                     <a>Quantité:' . $qté . '   
                     <br> 

                     <br>   
                     <a class="bouton_red" href="./index.php?controller=produit&action=retirerPanier&codeProduit=' . $p->get('codeProduit') . '">Retirer</a>
                    </div>

                
                </div>';

            }
            }

        ?>


	</div>

	<a class="bouton_panier">Passer la commande</a>





</div>