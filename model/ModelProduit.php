<?php
require_once (File::build_path(array('model','Model.php')));

class ModelProduit extends Model {

  protected static $primary = 'codeProduit';
  protected static $object = 'produit';

	private $codeProduit;
	private $nomProduit;
	private $prixProduit;
	private $descProduit;
	private $stockProduit;

  // Getter générique (pas expliqué en TD)
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

    $this->nomProduit = $data["nomProduit"];
    $this->prixProduit = $data["prixProduit"];
    $this->descProduit=$data["descProduit"];
    $this->stockProduit=$data["stockProduit"];

  }
}






}


?>
