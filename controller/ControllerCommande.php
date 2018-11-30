<?php

require_once (File::build_path(array('model', 'ModelCommande.php')));
require_once (File::build_path(array('model', 'ModelAssociationCommande.php')));

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


    public static function read() {

        if(isset($_GET['codeCommande'])) {


                $tab_obj = ModelAssociationCommande::selectAll();

                $tab_associations=array();

                $tab_p=array();

                $c=ModelCommande::select($_GET['codeCommande']);

                $tab_qté=array();

               foreach ($tab_obj as $association) {


                    if($association->get('idCommande')===$_GET['codeCommande']){

                        array_push($tab_associations, $association);
                        array_push($tab_qté,$association->get('quantité'));

                    }

                
               }


              foreach ($tab_associations as $association ){

                    $p = ModelProduit::select($association->get('codeProduit'));

                    if($p){
                    
                        array_push($tab_p, $p);
                    }

                }

                $view = 'detail';
                $pagetitle = 'Votre commande N°'.$_GET['codeCommande'];
                require (File::build_path(array('view', 'view.php')));
       
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
