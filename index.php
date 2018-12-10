<?php

session_start();

if (!isset($_COOKIE["produits_panier"])){


	$tab = array();
	setcookie("produits_panier",serialize($tab),time()+3600); //on dépose le cookie pour les produits du panier


}

require_once __DIR__ . DIRECTORY_SEPARATOR .'lib'. DIRECTORY_SEPARATOR .'File.php';
require_once __DIR__. DIRECTORY_SEPARATOR. 'lib'. DIRECTORY_SEPARATOR. 'Session.php'; 
require_once (File::build_path(array('controller', 'routeur.php')));

?>