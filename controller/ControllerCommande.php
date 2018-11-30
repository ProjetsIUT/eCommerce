<?php

require_once (File::build_path(array('model', 'ModelCommande.php')));

class ControllerCommande {

	protected static $object = 'commande';


	public static function readAll() {

    

        $codeUser=$_GET['codeUser'];

        $tab= ModelCommande::selectAll();

        $tab_c = array();


       foreach ($tab as $commande) {


       		if($commande->get('codeUtilisateur')===$codeUser){



       			array_push($tab_c, $commande);

       		}

       	
       }


        $view = 'historique';
        $pagetitle = 'Historique de vos commandes';
        require (File::build_path(array('view', 'view.php')));

    }


    public static function findProduits($codeCommande){

    	 $c = ModelProduit::select($codeCommande);

    	 $tab_p = array();

    	 $tab_p=$c->listProduits();




    }



    public static function read() {

        if(isset($_GET['codeCommande'])) {
            $c = ModelProduit::select($_GET['codeCommande']);
            
            if($c) {
          		
          		$tab_p=$c->listProduits();
                $view = 'detail';
                $pagetitle = 'Votre commande N°'.$c->get('idCommande').'';
                require (File::build_path(array('view', 'view.php')));
            }
            else {
                $error_code = 'read : produit n\'existant pas';
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'error.php')));
            }
        }
        else {

            $error_code = 'read : codeCommande vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'error.php')));
        }
    }








}




?>
