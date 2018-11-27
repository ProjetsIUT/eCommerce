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
        $view = 'update';
        $pagetitle = 'Ajout d\'un produit';
        require (File::build_path(array('view', 'view.php')));
    }
    
    public static function created() {
        if(isset($_GET['codeProduit']) && isset($_GET['nomProduit']) && isset($_GET['prixProduit']) && isset($_GET['descProduit']) && isset($_GET['stockProduit'])) {
                $view = 'created';
                $pagetitle = 'Produit ajouté';
                $data = array(
                    "codeProduit" => $_GET['codeProduit'],
                    "nomProduit" => $_GET['nomProduit'],
                    "prixProduit" => $_GET['prixProduit'],
                    "descProduit" => $_GET['descProduit'],
                    "stockProduit" => $_GET['stockProduit'],
                );
                $p = new ModelProduit($_GET['codeProduit'], $_GET['nomProduit'], $_GET['prixProduit'], $_GET['descProduit'], $_GET['stockProduit']);
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
        if(isset($_GET['login']) && isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['mdp'])) {
            if ($_SESSION['login'] === $_GET['login'] || Session::is_admin()) {
                if($_GET['mdp'] === $_GET['vmdp']) {
                    $view = 'updated';
                    $pagetitle = 'Utilisateur modifié';
                    $mdpsecu = Security::chiffrer($_GET['mdp']);
                    $login = $_GET['login'];
                    $_GET['admin'] = '';
                    if ($_GET['admin'] == 0 || $_GET['admin'] == 1) {
                        $vadmin = 1;
                    }
                    else if($_GET['admin'] == '' || $_GET['admin'] == NULL) {
                        $vadmin = 0;
                    }
                    $data = array(
                        "login" => $_GET['login'],
                        "nom" => $_GET['nom'],
                        "prenom" => $_GET['prenom'],
                        "mdp" => $mdpsecu,
                        "admin" => $vadmin,
                        "email" => $_GET['email'],
                    );
                    $u = new ModelUtilisateur($_GET['login'], $_GET['nom'], $_GET['prenom'], $mdpsecu, $_GET['admin']);
                    $u->update($data);
                    $tab_u = ModelUtilisateur::selectAll();
                    require (File::build_path(array('view', 'view.php')));
                } else {
                    echo('Vos deux mots de passe ne sont pas identique !');
                }
            }
            else {
                $view = 'connect';
                $pagetitle = 'Connexion';
                require (File::build_path(array('view', 'view.php')));
            }

        }
        else {
            $controller = 'utilisateur';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
        }
    }
}

?>