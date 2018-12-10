<?php

require_once (File::build_path(array('model', 'ModelCartesBleues.php')));

class ControllerCartesBleues {

	public static $object = "cartesBleues";

	public static function readAll(){

		$tab_cartes = ModelCartesBleues::selectByUser();
		$view="cartes";
		$pagetitle = 'Vos cartes bleues enregistrées';
        require (File::build_path(array('view', 'view.php')));

	}


	public static function create (){

		$view="creerCarte";
		$pagetitle = 'Ajouter une nouvelle carte bleue';
        require (File::build_path(array('view', 'view.php')));


	}

	public static function created(){

 
		$data = array('codeCarteBleue'=>$_GET['code'],'loginUtilisateur'=>$_GET['loginUtilisateur'], 'dateExp'=>$_GET['date'],'cryptogramme'=>$_GET['cryptogramme'],'nomTitulaire'=>$_GET['nom']);

		$c=new ModelCartesBleues();
		$c->save($data);
		self::readAll();

	}

	public static function delete (){

		$code = $_GET['code'];
		$c = ModelCartesBleues::select($code);

		$login = htmlspecialchars($c->get('loginUtilisateur'));

			ModelCartesBleues::delete($code);
			self::readAll();

	



	}









}



?>