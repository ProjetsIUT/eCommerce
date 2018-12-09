<?php


require_once (File::build_path(array('model','Model.php')));

class ModelAssociationCommande extends Model{

	protected static $primary='idCommande';
	protected static $object = 'associationCommande';

	private $idCommande;
	private $codeProduit;
	private $quantité;
	private $prixTotalPourProduit;

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
	    $this->codeProduit = $data["codeProduit"];
	    $this->quantité=$data["quantité"];
	    $this->prixTotalPourProduit=$data["prixTotalPourProduit"];

	  }
  }

}

?>