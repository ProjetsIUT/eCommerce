<?php

 equire_once "Model.php";

class ModelProduit extends Model {

	private $codeProduit;
	private $nomProduit;
	private $prixProduit;
	private $descProduit;
	private $stockProduit;



  public function __construct($code = NULL, $nom = NULL, $prix = NULL , $desc = NULL, $stock = NULL) {
  if (!is_null($m) && !is_null($c) && !is_null($i)) {
    // If both $m, $c and $i are not NULL, 
    // then they must have been supplied
    // so fall back to constructor with 3 arguments
    $this->codeProduit = $code;
    $this->nomProduit = $nom;
    $this->prixProduit = $prix;
    $this->descProduit=$desc;
    $this->stockProduit=$stock;

  }
}






}


?>
