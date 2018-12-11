<div id="panier">

	<h1>Mon Panier</h1>

	<div class="responsive">

	
        <?php

              if(isset($_COOKIE["produits_panier"])){

                   $tab= unserialize($_COOKIE["produits_panier"]); 

              }else{

                $tab = array();
              }

              
              if(!empty($tab)){



                   $montant_total=0;

             
                   foreach ($tab as $tab_produit) {

                    if($tab_produit!="null"){

                        $p=ModelProduit::select($tab_produit[0]);
                    
                        $qté=$tab_produit[1];
                        $montant_total+=(htmlspecialchars($p->get('prixProduit')))*$qté;

                        $codeP = htmlspecialchars($p->get('codeProduit'));

                        $img_nom = $codeP . '.png';
                       
                        echo '
                        <div class=Produit> 
                            <a href="index.php?controller=produit&action=read&codeProduit='.rawurlencode($codeP).'">
                                <img src="./Images/'.htmlspecialchars($img_nom).'" > 
                            </a>

                            <div class=desc>'.htmlspecialchars($p->get('nomProduit')).' 
                             <br> 
                             <a>Seulement  ' . htmlspecialchars($p->get('prixProduit')) . '€</a>
                             <br>
                             <a>Quantité:' . htmlspecialchars($qté) . '   
                             <br>
                             <br>
                             <a class="bouton" href="./index.php?codeProduit=' . htmlspecialchars($codeP) . '&controller=produit&action=ajoutPanier&quantite=-1">-</a>
                             <a class="bouton" href="./index.php?codeProduit=' . htmlspecialchars($codeP) . '&controller=produit&action=ajoutPanier&quantite=1">+</a>
                       
                            </div>

                        
                        </div>';

                    }
                }

        }

        ?>


	</div>


    <?php 

        if(isset($montant_total)){

            echo'

            <strong class="total">Total: '. $montant_total . '€</strong>

            <br>
            <a class="bouton" href="./">Continuer vos achats sans plus attendre !</a>
            <a class="bouton_panier" href="./index.php?controller=commande&action=passerCommande&montant='. $montant_total .'">Passer la commande</a>
            ';


        }else{

            echo '

                <div class="div_center">
                <h2>Votre panier est vide !</h2>
                <a class="bouton" href="./">Continuer vos achats sans plus attendre !</a> 
                </div>

            ';
        } 

    ?>






</div>