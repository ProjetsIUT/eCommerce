<?php

require_once (File::build_path(array('model','Model.php')));
require_once (File::build_path(array('model','ModelProduit.php')));
require_once (File::build_path(array('model','ModelAssociationCommande.php')));

class ModelCommande extends Model{

	protected static $primary='idCommande';
	protected static $object = 'commande';

	private $idCommande;
	private $dateCommande;
	private $loginUtilisateur;
	private $prixTotalCommande;
	private $adresseLivraisonCommande;
	private $paiementFois;
	private $idCarteBleue;

 public function get($nom_attribut) {

    if (property_exists($this, $nom_attribut))
        return $this->$nom_attribut;
    return false;

  }

  // Setter générique (pas expliqué en TD)
  public function set($nom_attribut, $valeur) {

    if (property_exists($this, $nom_attribut))
        $this->$nom_attribut = $valeur;
    return false;

  }

  public function __construct($data = array()) {

	  if (!empty($data)) {

	    $this->idCommande= $data["idCommande"];
	    $this->loginUtilisateur = $data["loginUtilisateur"];
	    $this->prixTotalCommande=$data["prixTotalCommande"];
	    $this->adresseLivraisonCommande=$data["adresseLivraisonCommande"];
	    $this->paiementFois=$data["paiementFois"];
	    $this->idCarteBleue=$data["idCarteBleue"];
      $this->dateCommande = date("Y-m-d H:i:s");

	  }
  }


  public function listProduits(){

  	      /*  $table_name = 'ecommerce_appartientCommande';
            $name = 'associationCommande';
            $class_name = 'Model' . ucfirst($name);
            $rep = Model::$pdo->query("SELECT * FROM $table_name");
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab_obj = $rep->fetchAll();*/

            $tab_obj = ModelAssociationCommande::select($this->idCommande);

            var_dump($tab_obj);

            $tab_a=array();
            $tab_p=array();
           
            foreach ($tab_obj as $association => $idCommande) {

            	if($idCommande===$this->idCommande){

            		array_push($tab_a,$association);
            	} 
               

            }

            foreach ($tab_a as $association => $codeProduit){

            	$p = ModelProduit::select($codeProduit);

            	if($p){
            	
            		array_push($tab_p, $p);
            	}

            }
           
            return $tab_p;


  }






}



?>