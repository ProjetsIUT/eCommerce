<?php

require_once (File::build_path(array('model', 'ModelCommande.php')));
require_once (File::build_path(array('model', 'ModelAssociationCommande.php')));

class ControllerCommande {

	protected static $object = 'commande';

 public static function create(){

        
      $id = mt_rand();

      $data=array('idCommande'=>$id,'loginUtilisateur'=>$_SESSION['loginUtilisateur'],'prixTotalCommande'=>$_GET['prixTotal'], 'adresseLivraisonCommande'=>$_GET['adresse'], 'paiementFois'=>$_GET['fois'], 'idCarteBleue'=>$_GET['carte'], 'dateCommande'=> date("Y-m-d H:i:s"));
      $c=new ModelCommande();

      $c->save($data);

      $tab = unserialize($_COOKIE['produits_panier']);

      foreach ($tab as $tab_produit) {
          
          $produit = ModelProduit::select($tab_produit[0]);
          $prix_produit = htmlspecialchars($produit->get('prixProduit'));
          $prix_total = $prix_produit * $tab_produit[1];

          $data2 = array('idCommande'=>$id,'codeProduit'=>$tab_produit[0],'quantite'=>$tab_produit[1],'prixTotalPourProduit'=>$prix_total);
          $ac=new ModelAssociationCommande();
          $ac->save($data2);

          ControllerProduit::majStock($produit,$tab_produit[1]);


      }


  }


	public static function readAll() {

            $loginUser= $_SESSION['loginUtilisateur'];
            $tab= ModelCommande::selectAll();
            $tab_c = array();
    
            foreach ($tab as $commande) {

                   if($commande->get('loginUtilisateur')===$loginUser){
    
                       array_push($tab_c, $commande);
    
                   }

            }
    
            $view = 'historique';
            $pagetitle = 'Historique de vos commandes';
            require (File::build_path(array('view', 'view.php')));
    

    
  }


    public static function read(){

            if(isset($_GET['codeCommande'])) {

                $c=ModelCommande::select($_GET['codeCommande']);
                $tab_associations = ModelAssociationCommande::selectByOrder();
                $tab_p = array();
                $tab_qte = array();
  
                foreach ($tab_associations as $association) {
  
                  $p=ModelProduit::select(htmlspecialchars($association->get('codeProduit')));
                  array_push($tab_p, $p);
                  array_push($tab_qte,htmlspecialchars($association->get('quantite')));
                    
                }
  
                $view = 'detail';
                $pagetitle = 'Votre commande N°'.$_GET['codeCommande'];
                require (File::build_path(array('view', 'view.php')));
  
                }else{
        
                    $error_code = 'read : codeCommande vide';
                    $view = 'error';
                    $pagetitle = 'Erreur';
                    require (File::build_path(array('view', 'error.php')));
                }     

    }

 
    
    public static function passerCommande(){

        $tab = unserialize($_COOKIE['produits_panier']);
        $view = "passerCommande";
        $pagetitle = "Passer votre commande";
        require (File::build_path(array('view', 'view.php')));

    }

    public static function validerCommande(){
    
      self::create();
    
      $view="commandé";
      $pagetitle="Merci pour votre commande";
      require (File::build_path(array('view', 'view.php')));

      setcookie("produits_panier",0,time()-1); //Faire expirer le cookie


   }





}








?>
