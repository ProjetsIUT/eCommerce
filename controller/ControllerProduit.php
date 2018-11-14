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
}

?>