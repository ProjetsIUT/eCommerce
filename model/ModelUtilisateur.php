<?php
require_once (File::build_path(array('model','Model.php')));

class ModelUtilisateur extends Model{
    protected static $primary='codeUtilisateur';
    protected static $object = 'utilisateur';
    private $codeUtilisateur;
    private $loginUtilisateur;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $adresseFacturationUtilsateur;
    private $adresseLivraisonUtilisateur;
    private $passUtilisateur;
    private $idCodeBleue;
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
            $this->codeUtilisateur = $data['codeUtilisateur'];
            $this->loginUtilisateur = $data['loginUtilisateur'];
            $this->nomUtilisateur = $data['nomUtilisateur'];
            $this->prenomUtilisateur = $data['prenomUtilisateur'];
            $this->adresseFacturationUtilsateur = $data['adresseFacturationUtilisateur'];
            $this->adresseLivraisonUtilisateur = $data['adresseLivraisonUtilisateur'];
            $this->passUtilisateur = $data['passUtilisateur'];
            $this->idCodeBleue = $data['idCodeBleue'];
            $this->emailUser = $data['emailUser'];
        }
    }
    
    public static function checkPassword($codeUtilisateur, $mot_de_passe_chiffre) {
        $u = static::select($codeUtilisateur);
        if ($mot_de_passe_chiffre === $u->get('passUtilisateur')) {
            
            return true;
        }
        
        return false;
    } 

}
