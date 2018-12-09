<?php
require_once (File::build_path(array('model', 'ModelUtilisateur.php')));
require_once (File::build_path(array('lib', 'Security.php')));

class ControllerUtilisateur {
    protected static $object = 'utilisateur';
    
    public static function readAll() {
        if(Session::is_admin()) {
            $tab_u = ModelUtilisateur::selectAll();
            $view = 'list';
            $pagetitle = 'Liste des utilisateurs';
            require (File::build_path(array('view', 'view.php')));
        } else {
            $error_code = 'readAll : Vous ne pouvez pas avoir accès à des informations confidentiels sur d\'autre client';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'error.php')));
        }
    }

    public static function show_panier(){


        $tab_p = 
        $view = 'panier';
        $pagetitle = 'Mon panier';
        require (File::build_path(array('view', 'view.php')));

    }
    
    public static function read() {
        if(isset($_GET['loginUtilisateur'])) {
            $u = ModelUtilisateur::select($_GET['loginUtilisateur']);
            $ulogin = $u->get('loginUtilisateur');
            if($u) {
                if (Session::is_user($_GET['loginUtilisateur']) || Session::is_admin()) {
                    $uprenom = $u->get('prenomUtilisateur');
                    $unom = $u->get('nomUtilisateur');
                    $uadresseF = $u->get('adresseFacturationUtilisateur');
                    $uadresseL = $u->get('adresseLivraisonUtilisateur');
                    $uidCB = $u->get('idCarteBleue');
                    $uemail = $u->get('emailUser');
                    if (Session::is_admin()) {
                        $utype = $u->get('typeUser');
                        if($utype == 1) {
                            $utype = 'Oui';
                        }
                        else if ($utype == 0 || $utype == NULL){
                            $utype = 'Non';
                        }
                    }
                    if ($uadresseF == NULL) {
                        $uadresseF = 'non renseigné';
                    }
                    if ($uadresseL == NULL) {
                        $uadresseL = 'non renseigné';
                    }
                    if ($uidCB == NULL) {
                        $uidCB = 'non renseigné';
                    }
                    $view = 'detail';
                    $pagetitle = 'Informations sur l\'utilisateur';
                    require (File::build_path(array('view', 'view.php')));
                }
                else {
                    $error_code = 'read : Vous ne pouvez pas avoir accès à des informations confidentiels sur d\'autre client';
                    $view = 'error';
                    $pagetitle = 'Erreur';
                    require (File::build_path(array('view', 'error.php')));
                }
            }
            else {
                $error_code = 'read : loginUtilisateur inexistant';
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'error.php')));
            }
        }
        else {
            $error_code = 'read : loginUtilisateur vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'error.php')));
        }
    }
    
    public static function delete() {

        if(isset($_GET['loginUtilisateur'])) {
            if (Session::is_user($_GET['loginUtilisateur']) || Session::is_admin()) {
                if(ModelUtilisateur::select($_GET['loginUtilisateur'])) {
                    $u = ModelUtilisateur::delete($_GET['loginUtilisateur']);
                    $view = 'deleted';
                    $pagetitle = 'Suppression d\'un utilisateur';
                    $tab_u = ModelUtilisateur::selectAll();
                    if(Session::is_user($_GET['loginUtilisateur'])) {
                        self::deconnect();
                    }
                    require (File::build_path(array('view', 'view.php')));
                }
                else {
                    $error_code = 'delete : loginUtilisateur inexistant';
                    $view = 'error';
                    $pagetitle = 'Erreur';
                    require (File::build_path(array('view', 'error.php')));
                }
            } 
            else {
                $error_code = 'delete : Vous ne pouvez pas effectuer cette action';
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'error.php')));
            } 
        }
        else {
            $error_code = 'delete : loginUtilisateur vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'error.php')));
        }
    }
    
    public static function create() {
        $type = 'Ajout';
        $view = 'update';
        $pagetitle = 'Ajout d\'un utilisateur';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function connect() {
        $view = 'connect';
        $pagetitle = 'Se connecter';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function deconnect() {
        session_unset(); 
        session_destroy();
        $redirection = 'index.php';
        header('Location: '.$redirection);
    }

    public static function update() {
        $type = "Modification";
        if (isset($_GET['loginUtilisateur'])) {
            if (Session::is_user($_GET['loginUtilisateur']) && !Session::is_admin()) {
                $u = ModelUtilisateur::select($_GET['loginUtilisateur']);
                $ulogin = $u->get('loginUtilisateur');
                $uprenom = $u->get('prenomUtilisateur');
                $unom = $u->get('nomUtilisateur');
                $uadresseF = $u->get('adresseFacturationUtilisateur');
                $uadresseL = $u->get('adresseLivraisonUtilisateur');
                $umdp = $u->get('passUtilisateur');
                $uidCB = $u->get('idCarteBleue');
                $uemail = $u->get('emailUser');
                $view = 'update';
                $pagetitle = 'Mon compte';
                require (File::build_path(array('view', 'view.php')));
            
            }
            else if(Session::is_admin()) {
                $u = ModelUtilisateur::select($_GET['loginUtilisateur']);
                $ulogin = $u->get('loginUtilisateur');
                $uprenom = $u->get('prenomUtilisateur');
                $unom = $u->get('nomUtilisateur');
                $uadresseF = $u->get('adresseFacturationUtilisateur');
                $uadresseL = $u->get('adresseLivraisonUtilisateur');
                $umdp = $u->get('passUtilisateur');
                $uidCB = $u->get('idCarteBleue');
                $uemail = $u->get('emailUser');
                $utype = $u->get('typeUser');
                $view = 'update';
                $pagetitle = 'Utilisateur '.$ulogin;
                require (File::build_path(array('view', 'view.php')));
            }
            else {
                $view = 'connect';
                $pagetitle = 'Connexion';
                require (File::build_path(array('view', 'view.php')));
            } 
        }
        else {
            $error_code = 'update : loginUtilisateur vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'error.php')));
        }
    }

    public static function validate() {
        $u = ModelUtilisateur::select($_GET['loginUtilisateur']);
        $nr = $_GET['nonce'];
        if ($u) {
            if ($nr === $u->get('nonce')) {
                $data = array(
                    "loginUtilisateur" => $_GET['loginUtilisateur'],
                    "nonce" => NULL,
                );
                ModelUtilisateur::update($data);
                $pagetitle = 'Validé';
                $view = 'validate';
                require (File::build_path(array('view', 'view.php')));
            }
            else if($u->get('nonce') == NULL){
                $error_code = 'validate : Votre compte a déja été validé';
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'error.php')));
            }
            else {
                $error_code = 'validate : Nous ne pouvons accéder à votre requête';
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'error.php')));
            }
        }
        else {
            $error_code = 'validate : loginUtilisateur inexistant';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'error.php')));
        }
    }
    
    public static function connected() {
        if(isset($_GET['loginUtilisateur']) && $_GET['passUtilisateur']) {
            $mdpsecu = Security::chiffrer($_GET['passUtilisateur']);
            $verif = ModelUtilisateur::checkPassword($_GET['loginUtilisateur'], $mdpsecu);
            $u = ModelUtilisateur::select($_GET['loginUtilisateur']);
            if($u) {
                if($verif) {
                    if($u->get('nonce') == NULL) {
                            $_SESSION['loginUtilisateur'] = $_GET['loginUtilisateur'];
                        if($u->get('typeUser') == 1) {
                            $_SESSION['admin'] = true;
                        }
                        else if($u->get('typeUser') == 0){
                            $_SESSION['admin'] = false;
                        }
                        $redirection = 'index.php?controller=utilisateur&action=read&loginUtilisateur='.$_GET['loginUtilisateur'].'';
                        header('Location: '.$redirection);
                    }
                    else {
                        $verif = 'Vous n\'avez pas validé votre adresse email !';
                        $view = 'connect';
                        $pagetitle = 'Se connecter';
                        require (File::build_path(array('view', 'view.php')));
                    }
                }
                else {
                    $verif = 'Votre mot de passe ou votre nom d\'utilisateur est incorrect';
                    $view = 'connect';
                    $pagetitle = 'Se connecter';
                    require (File::build_path(array('view', 'view.php')));
                }
            }
            else {
                $verif = 'Votre nom d\'utilisateur est inexistant';
                $view = 'connect';
                $pagetitle = 'Se connecter';
                require (File::build_path(array('view', 'view.php')));
            }
        }
        else {
            $error_code = 'connected : loginUtilisateur vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'error.php')));
        }
    }

    public static function errorAction() {
		$error_code = 'routeur : action inexistante !';
		$view = 'error';
		$pagetitle = 'Erreur';
		require (File::build_path(array('view', 'error.php')));
    }
      
    public static function created() {
        if(isset($_GET['loginUtilisateur']) && isset($_GET['nomUtilisateur']) && isset($_GET['prenomUtilisateur']) && isset($_GET['adresseFacturationUtilisateur']) && isset($_GET['adresseLivraisonUtilisateur']) && isset($_GET['passUtilisateur']) && isset($_GET['emailUser'])) {

            if($_GET['passUtilisateur'] === $_GET['vpassUtilisateur']) {
                $view = 'created';
                $pagetitle = 'Utilisateur ajouté';
                $mdpsecu = Security::chiffrer($_GET['passUtilisateur']);

                $vemail = filter_var($_GET['emailUser'] , FILTER_VALIDATE_EMAIL);
                
                if(Session::is_admin() && isset($_GET['typeUser'])) {
                    $valuet = $_GET['typeUser'];
                }
                else {
                    $valuet = NULL;
                } 

                if ($vemail) {
                    $nonc = Security::generateRandomHex();
                    $data = array(
                        "loginUtilisateur" => $_GET['loginUtilisateur'],
                        "nomUtilisateur" => $_GET['nomUtilisateur'],
                        "prenomUtilisateur" => $_GET['prenomUtilisateur'],
                        "adresseFacturationUtilisateur" => $_GET['adresseFacturationUtilisateur'],
                        "adresseLivraisonUtilisateur" => $_GET['adresseLivraisonUtilisateur'],
                        "passUtilisateur" => $mdpsecu,
                        "emailUser" => $_GET['emailUser'],
                        "typeUser" => $valuet,
                        "nonce" => $nonc,
                    );
                    $u = new ModelUtilisateur($data);
                    $u->save($data);
                        $destinataire = $_GET['emailUser'];
                        $sujet = 'Activer votre compte';
                        $entete = 'From serviceclient@pineapple.com';
                        $mail = 'Bienvenue sur PineApple,
                        
                        Pour activer votre compte, veuillez cliquez sur le lien-ci dessous ou 
                        copier/coller dans votre navigateur internet

                        http://webinfo.iutmontp.univ-montp2.fr/~bourdesj/eCommerce/index.php?controller=utilisateur&action=validate&loginUtilisateur='.rawurlencode($_GET['loginUtilisateur']).'&nonce='.rawurlencode($nonc).'


                        Ceci est un mail automatique, Merci de ne pas y répondre';
                        mail($destinataire, $sujet, $mail, $entete);
                        require (File::build_path(array('view', 'view.php')));
                } else {
                    $type = 'Ajout';
                    $verif = 'Votre email n\'est pas valide !';
                    $view = 'update';
                    $pagetitle = 'Ajout d\'un utilisateur';
                    require (File::build_path(array('view', 'view.php')));
                }
                
            } else {
                $type = 'Ajout';
                $verif = 'Vos deux mots de passe ne sont pas identique !';
                $view = 'update';
                $pagetitle = 'Ajout d\'un utilisateur';
                require (File::build_path(array('view', 'view.php')));
            }
        }
        else {
            $error_code = 'created : l\'un des champs est vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'error.php')));
       }
    }

    public static function updated() {
        if(isset($_GET['loginUtilisateur']) && isset($_GET['nomUtilisateur']) && isset($_GET['prenomUtilisateur']) && isset($_GET['adresseFacturationUtilisateur']) && isset($_GET['adresseLivraisonUtilisateur']) && isset($_GET['passUtilisateur']) && isset($_GET['emailUser'])) {

            if($_GET['passUtilisateur'] === $_GET['vpassUtilisateur']) {
                $view = 'updated';
                $pagetitle = 'Utilisateur ajouté';
                $mdpsecu = Security::chiffrer($_GET['passUtilisateur']);

                $data = array(
                    "loginUtilisateur" => $_GET['loginUtilisateur'],
                    "nomUtilisateur" => $_GET['nomUtilisateur'],
                    "prenomUtilisateur" => $_GET['prenomUtilisateur'],
                    "adresseFacturationUtilisateur" => $_GET['adresseFacturationUtilisateur'],
                    "adresseLivraisonUtilisateur" => $_GET['adresseLivraisonUtilisateur'],
                    "passUtilisateur" => $mdpsecu,
                    "emailUser" => $_GET['emailUser'],
                    "typeUser" => $_GET['typeUser'],
                );
                $u = new ModelUtilisateur($data);
                $u->update($data);
                require (File::build_path(array('view', 'view.php')));
            } else {
                $type = 'Ajout';
                $verif = 'Vos deux mots de passe ne sont pas identique !';
                $view = 'update';
                $pagetitle = 'Ajout d\'un utilisateur';
                require (File::build_path(array('view', 'view.php')));
            }

        }
        else {
            $error_code = 'updated : l\'un des champs est vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'error.php')));
        }
    }

    
}