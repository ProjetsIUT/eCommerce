<?php

require_once (File::build_path(array('controller', 'ControllerProduit.php')));
require_once (File::build_path(array('controller', 'ControllerUtilisateur.php')));
$controller_default = 'produit';

if(isset($_COOKIE['preference'])) {
	$controller_default = unserialize($_COOKIE['preference']);
}

if(!isset($_GET['controller'])) {
	$controller = $controller_default;
} else {
	$controller = $_GET['controller'];
}

$controller_class = 'Controller' . ucfirst($controller);

if(class_exists($controller_class)){
	
	if(!isset($_GET['action'])) {
		$action = 'readAll';
	}
	else {
		$action = $_GET['action'];
	}

	if (isset($action)) {

		$class_methods = get_class_methods($controller_class);

		if(in_array($action, $class_methods)) {
			$controller_class::$action();
		}
		else {
			$object = 'produit';
			$error_code = 'routeur : action inexistante !';
			$view = 'error';
			$pagetitle = 'Erreur';
			require (File::build_path(array('view', 'error.php')));
		}
	}

}
else {
	$object = 'produit';
	$error_code = 'routeur : class inexistante !';
	$view = 'error';
	$pagetitle = 'Erreur';
	require (File::build_path(array('view', 'error.php')));
}

?>