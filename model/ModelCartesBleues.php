<?php

require_once (File::build_path(array('model','Model.php')));

class ModelCartesBleues extends Model{

	protected static $primary='codeCarteBleue';
    protected static $object = 'cartesBleues';

    private $codeCarteBleue;
    private $loginUtilisateur;
    private $dateExp;
    private $cryptogramme;
    private $nomTitulaire;


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

    // un constructeur
    public function __construct($data = array()) {
        if (!empty($data)){

        	$this->codeCarteBleue=$data['codeCarteBleue'];
        	$this->loginUtilisateur=$data['loginUtilisateur'];
        	$this->dateExp=$data['dateExp'];
        	$this->cryptogramme=$data['cryptogramme'];
        	$this->nomTitulaire=$data['nomTitulaire'];

        } 



    }



    public static function selectByUser(){

            $sql = "SELECT codeCarteBleue, loginUtilisateur, dateExp, cryptogramme, nomTitulaire FROM ecommerce_cartesBleues WHERE loginUtilisateur=:userId ";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql); //permet de protéger la requete SQL
           
            $values = array(
                "userId" => $_SESSION['loginUtilisateur'],
      
            );

            $req_prep->execute($values);

            $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelCartesBleues");
            $tab_obj = $req_prep->fetchAll();
            return $tab_obj;


        
    }

    




}


?>