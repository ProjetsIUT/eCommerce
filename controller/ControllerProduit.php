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
                else if ($p->get('stockProduit')==0){

                    $valueStock = 'Produit en rupture de stock';
                
                }
                else {
                    $valueStock = 'Plus que '.$p->get('stockProduit').' produits en stock !';
                }
                $img_nom = $p->get('nomProduit').'.png';
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

    public static function delete() {
        if(isset($_GET['codeProduit'])) {
            //if ($_SESSION['login'] === $_GET['login'] || Session::is_admin()) {
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
            /*}
            else {
                $view = 'connect';
                $pagetitle = 'Connexion';
                require (File::build_path(array('view', 'view.php')));
            } */
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
            //if ($_SESSION['login'] === $_GET['login'] || Session::is_admin()) {
                //if($_GET['mdp'] === $_GET['vmdp']) {
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
                //} else {
                    //echo('Vos deux mots de passe ne sont pas identique !');
                //}
            /*}
            else {
                $view = 'connect';
                $pagetitle = 'Connexion';
                require (File::build_path(array('view', 'view.php')));
            } */

        }
        else {
            $error_code = 'updated : un des champs est vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
        }
    }
}

?>