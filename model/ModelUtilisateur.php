<?php
require_once (File::build_path(array('model','Model.php')));

class ModelUtilisateur extends Model{
    protected static $primary='loginUtilisateur';
    protected static $object = 'utilisateur';
    private $loginUtilisateur;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $adresseFacturationUtilisateur;
    private $adresseLivraisonUtilisateur;
    private $passUtilisateur;
    private $idCarteBleue;
    private $emailUser;

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
        if (!empty($data)) {
            //$this->codeUtilisateur = $data['codeUtilisateur'];
            $this->loginUtilisateur = $data['loginUtilisateur'];
            $this->nomUtilisateur = $data['nomUtilisateur'];
            $this->prenomUtilisateur = $data['prenomUtilisateur'];
            $this->adresseFacturationUtilisateur = $data['adresseFacturationUtilisateur'];
            $this->adresseLivraisonUtilisateur = $data['adresseLivraisonUtilisateur'];
            $this->passUtilisateur = $data['passUtilisateur'];
            //$this->idCarteBleue = $data['idCarteBleue'];
            $this->emailUser = $data['emailUser'];
        }
    }
    
    public static function checkPassword($loginUtilisateur, $mot_de_passe_chiffre) {
        $u = static::select($loginUtilisateur);
        if ($mot_de_passe_chiffre === $u->get('passUtilisateur')) {
            return true;
        }
        
        return false;
    } 

}