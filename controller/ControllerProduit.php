<?php 

require_once (File::build_path(array('model', 'ModelProduit.php')));

class ControllerProduit {
    protected static $object = 'produit';

    public static function readAll() {
        $tab_p = ModelProduit::selectAll();
        $view = 'list';
        $pagetitle = 'Nos produits';
        require (File::build_path(array('view', 'view.php')));
    }


    public static function read() {
        if(isset($_GET['codeProduit'])) {
            $p = ModelProduit::select($_GET['codeProduit']);
            
            if($p) {
                if ($p->get('stockProduit') > 20) {
                    $valueStock = 'En stock';
                }
                else if ($p->get('stockProduit') == 1) {
                    $valueStock = 'Plus qu\'un seul produit en stock !';
                }
                else if ($p->get('stockProduit')<=0){

                    $valueStock = 'Produit en rupture de stock';
                
                }
                else {
                    $valueStock = 'Plus que '.$p->get('stockProduit').' produits en stock !';
                }
                $img_nom = $p->get('codeProduit').'.png';
                $view = 'detail';
                $pagetitle = ''.$p->get('nomProduit').'';
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
            $error_code = 'read : codeProduit vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'error.php')));
        }
    }

    public static function errorAction() {
		$error_code = 'routeur : action inexistante !';
		$view = 'error';
		$pagetitle = 'Erreur';
		require (File::build_path(array('view', 'error.php')));
    }

    public static function errorClass() {
        $error_code = 'routeur : class demandé inexistante !';
	    $view = 'error';
	    $pagetitle = 'Erreur';
	    require (File::build_path(array('view', 'error.php')));
    }

    public static function delete() {
        if(isset($_GET['codeProduit'])) {
            if (Session::is_admin()) {
                if(ModelProduit::select($_GET['codeProduit'])) {
                    $p = ModelProduit::delete($_GET['codeProduit']);
                    $view = 'deleted';
                    $pagetitle = 'Suppression d\'un utilisateur';
                    $tab_p = ModelProduit::selectAll();
                    require (File::build_path(array('view', 'view.php')));
                }
                else {
                    $error_code = 'delete : erreur fonction delete';
                    $view = 'error';
                    $pagetitle = 'Erreur';
                    require (File::build_path(array('view', 'view.php')));
                }
            }
            else {
                $error_code = 'delete : Ce droit est exclusivement réservé aux administrateurs';
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'view.php')));
            } 
        }
        else {
            $error_code = 'delete : codeProduit vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
        }
    }

    public static function create() {
        $type = "Ajout";
        $view = 'update';
        $pagetitle = 'Ajout d\'un produit';
        require (File::build_path(array('view', 'view.php')));
    }
    
    public static function created() {
        if(isset($_GET['nomProduit']) && isset($_GET['prixProduit']) && isset($_GET['descProduit']) && isset($_GET['stockProduit'])) {
            if(Session::is_admin()) {    
                $view = 'created';
                $pagetitle = 'Produit ajouté';
                $data = array(
                    "nomProduit" => $_GET['nomProduit'],
                    "prixProduit" => $_GET['prixProduit'],
                    "descProduit" => $_GET['descProduit'],
                    "stockProduit" => $_GET['stockProduit'],
                );
                $p = new ModelProduit($data);
                $p->save($data);
                $tab_p = ModelProduit::selectAll();
                require (File::build_path(array('view', 'view.php')));
            }
            else {
                $error_code = 'created : Ce droit est exclusivement réservé aux administrateurs';
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'view.php')));
            }
        }
        else {
            $error_code = 'created : un des champs est vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
       }
    }

    public static function update() {
        $type = "Modification";
        if (isset($_GET['codeProduit'])) {
            $p = ModelProduit::select($_GET['codeProduit']);
            $codeP = $p->get('codeProduit');
            $nomP = $p->get('nomProduit');
            $prixP = $p->get('prixProduit');
            $descP = $p->get('descProduit');
            $stockP = $p->get('stockProduit');
            $view = 'update';
            $pagetitle = 'Produit à modifier';
            require (File::build_path(array('view', 'view.php')));
            
        }
        else {
            $error_code = 'update : codeProduit vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
        }
    }

    public static function updated() {
        if(isset($_GET['codeProduit']) && isset($_GET['nomProduit']) && isset($_GET['prixProduit']) && isset($_GET['descProduit']) && isset($_GET['stockProduit'])) {
            if(Session::is_admin()) {
                    $view = 'updated';
                    $pagetitle = 'Produit modifié';
                    $data = array(
                        "codeProduit" => $_GET['codeProduit'],
                        "nomProduit" => $_GET['nomProduit'],
                        "prixProduit" => $_GET['prixProduit'],
                        "descProduit" => $_GET['descProduit'],
                        "stockProduit" => $_GET['stockProduit'],
                    );
                    $p = new ModelProduit($data);
                    $p->update($data);
                    $tab_p = ModelProduit::selectAll();
                    require (File::build_path(array('view', 'view.php')));
            }
            else {
                $error_code = 'updated : Ce droit est exclusivement réservé aux administrateurs';
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'view.php')));
            } 

        }
        else {
            
            $error_code = 'updated : un des champs est vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
        }
    }



    public static function ajoutPanier(){

        $tab = unserialize($_COOKIE["produits_panier"]);
        $tab_new = array();
        $tab_produit = array();
        $code = $_GET['codeProduit'];
        $qté = $_GET['quantite'];
        $found=false;

        if(!empty($tab)){

    
            foreach ($tab as $tab_p) {


                if($code===$tab_p[0]){

                    array_push($tab_produit,$code);
                    if($tab_p[1]+$qté <= 0){


                        self::retirerPanier();
                        exit(0);
                    }
                    array_push($tab_produit,$tab_p[1]+$qté);

                    array_push($tab_new, $tab_produit);
                    $found=true;
                    
                   

                }else{

                    array_push($tab_new,$tab_p);
                }

        
                
            }

                if(!$found){

                 array_push($tab_produit,$code);
                 array_push($tab_produit,1);

                 array_push($tab, $tab_produit);
                 setcookie("produits_panier",serialize($tab),time()+3600);
                 header('Location: ./index.php?action=show_panier&controller=utilisateur');
                 exit(0);
           


                }else{


                  setcookie("produits_panier",serialize($tab_new),time()+3600);
                  header('Location: ./index.php?action=show_panier&controller=utilisateur');
                  exit(0);
           


                }

        }


            array_push($tab_produit,$code);
            array_push($tab_produit,1);

            array_push($tab, $tab_produit);

            setcookie("produits_panier",serialize($tab),time()+3600); //on dépose le cookie pour les produits du panier
            header('Location: ./index.php?action=show_panier&controller=utilisateur');
          


 
    }


    public static function retirerPanier(){

        $tab = unserialize($_COOKIE["produits_panier"]);

        $code = $_GET['codeProduit'];

        $new_tab=array();
        
        foreach ($tab as $tab_p) {
            
            if($tab_p[0]!=$code){

                array_push($new_tab, $tab_p);

            }
        }

        setcookie("produits_panier",serialize($new_tab),time()+3600); //on dépose le cookie pour les produits du panier

        header('Location: ./index.php?controller=utilisateur&action=show_panier');
        exit();
    
    }

    public static function majStock($produit,$qte){

      $stock_produit=htmlspecialchars($produit->get("stockProduit"));
      $new_stock = $stock_produit - $qte;

      $data = array(
                        "codeProduit" => htmlspecialchars($produit->get('codeProduit')),
                        "nomProduit" => htmlspecialchars($produit->get('nomProduit')),
                        "prixProduit" => htmlspecialchars($produit->get('prixProduit')),
                        "descProduit" => htmlspecialchars($produit->get('descProduit')),
                        "stockProduit" => $new_stock,
      );

       $produit->update($data);


  }




}

?>