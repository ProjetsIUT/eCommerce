<?php

require_once (File::build_path(array('controller', 'ControllerProduit.php')));
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
		$action = 'selectAll';
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
			$view = 'error';
			$pagetitle = 'Erreur';
			require (File::build_path(array('view', 'view.php')));
		}
	}

}
else {
	$view = 'error';
	$pagetitle = 'Erreur';
	require (File::build_path(array('view', 'view.php')));
}

?>