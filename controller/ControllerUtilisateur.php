<?php
require_once (File::build_path(array('model', 'ModelUtilisateur.php')));
require_once (File::build_path(array('lib', 'Security.php')));

class ControllerUtilisateur {
    protected static $object = 'utilisateur';
    
    public static function readAll() {
        $tab_u = ModelUtilisateur::selectAll();
        $view = 'list';
        $pagetitle = 'Liste des utilisateurs';
        require (File::build_path(array('view', 'view.php')));
    }
    
    public static function read() {
        if(isset($_GET['codeUtilisateur'])) {
            $u = ModelUtilisateur::select($_GET['codeUtilisateur']);

            if($u) {
                $ucodeUtilisateur = $u->get('codeUtilisateur');
                $ulogin = $u->get('loginUtilisateur');
                $uprenom = $u->get('prenomUtilisateur');
                $unom = $u->get('nomUtilisateur');
                $uadresseF = $u->get('adresseFacturationUtilisateur');
                $uadresseL = $u->get('adresseLivraisonUtilisateur');
                $uidCB = $u->get('idCarteBleue');
                $uemail = $u->get('emailUser');
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
                $error_code = 'read : codeUtilisateur inexistant';
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'view.php')));
            }
        }
        else {
            $error_code = 'read : codeUtilisateur vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
        }
    }
    
    public static function delete() {

        if(isset($_GET['codeUtilisateur'])) {
            //if ($_SESSION['login'] === $_GET['login'] || Session::is_admin()) {
                if(ModelUtilisateur::select($_GET['codeUtilisateur'])) {
                    $u = ModelUtilisateur::delete($_GET['codeUtilisateur']);
                    $view = 'deleted';
                    $pagetitle = 'Suppression d\'un utilisateur';
                    $tab_u = ModelUtilisateur::selectAll();
                    require (File::build_path(array('view', 'view.php')));
                }
                else {
                    $error_code = 'delete : codeUtilisateur inexistant';
                    $view = 'error';
                    $pagetitle = 'Erreur';
                    require (File::build_path(array('view', 'view.php')));
                }
            /*} 
            else {
                $view = 'connect';
                $pagetitle = 'Connexion';
                require (File::build_path(array('view', 'view.php')));
            } */
        }
        else {
            $error_code = 'delete : codeUtilisateur vide';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
        }
    }
    
    public static function create() {
        $view = 'update';
        $pagetitle = 'Ajout d\'un utilisateur';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function connect() {
        $view = 'connect';
        $pagetitle = 'Se connecter';
        require (File::build_path(array('view', 'view.php')));
    }
    /*
    public static function connected() {
        $controller = 'utilisateur';
        $view = 'detail';
        $pagetitle = 'Connecté';
        if(isset($_GET['login']) && $_GET['mdp']) {
            $mdpsecu = Security::chiffrer($_GET['mdp']);
            $verif = ModelUtilisateur::checkPassword($_GET['login'], $mdpsecu);
            if($verif) {
                $u = ModelUtilisateur::select($_GET['login']);
                $_SESSION['login'] = $_GET['login'];
                if($u->get('admin') == 1) {
                    $_SESSION['admin'] = true;
                }
                else {
                    $_SESSION['admin'] = false;
                }
                require (File::build_path(array('view', 'view.php')));
            }
            else {
                $controller = 'utilisateur';
                $view = 'error';
                $pagetitle = 'Erreur';
                require (File::build_path(array('view', 'view.php')));
            }
        }
        else {
            $controller = 'utilisateur';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
        }
    }

    public static function deconnect() {
        session_unset(); 
        session_destroy();
        $view = 'deconnected';
        $pagetitle = 'Déconnecté';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function created() {
        if(isset($_GET['login']) && isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['mdp'])) {
            //$controller = 'utilisateur';

            if($_GET['mdp'] === $_GET['vmdp']) {
                $view = 'created';
                $pagetitle = 'Utilisateur créé';
                $mdpsecu = Security::chiffrer($_GET['mdp']);

                $vemail = filter_var($_GET['emaill'] , FILTER_VALIDATE_EMAIL);
                
                if (!$vemail) {
                    $view = 'error';
                    $pagetitle = 'Error';
                    require (File::build_path(array('view', 'view.php')));
                } 
                $data = array(
                    "login" => $_GET['login'],
                    "nom" => $_GET['nom'],
                    "prenom" => $_GET['prenom'],
                    "mdp" => $mdpsecu,
                    "email" => $_GET['emaill'],
                );
                $u = new ModelUtilisateur($_GET['login'], $_GET['nom'], $_GET['prenom'], $mdpsecu, $_GET['emaill']);
                $u->save($data);
                $tab_u = ModelUtilisateur::selectAll();
                require (File::build_path(array('view', 'view.php')));
            } else {
                echo('Vos deux mots de passe ne sont pas identique !');
            }
        }
        else {
            $controller = 'utilisateur';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
       }
    }

    public static function update() {
        if (isset($_GET['login'])) {
            if ($_SESSION['login'] === $_GET['login'] && !Session::is_admin()) {
                $u = ModelUtilisateur::select($_GET['login']);
                $nom = $u->get('nom');
                $prenom = $u->get('prenom');
                $mdp = $u->get('mdp');
                $email = $u->get('email');
                $controller = 'utilisateur';
                $view = 'update';
                $pagetitle = 'Utilisateur à modifier';
                require (File::build_path(array('view', 'view.php')));
            }
            else if($_SESSION['login'] === $_GET['login'] || Session::is_admin()) {
                $u = ModelUtilisateur::select($_GET['login']);
                $nom = $u->get('nom');
                $prenom = $u->get('prenom');
                $mdp = $u->get('mdp');
                if ($u->get('admin') == 1) {
                    $admin = 0;
                }
                else if ($u->get('admin') == 0) {
                    $admin = 1;
                }
                $controller = 'utilisateur';
                $view = 'update';
                $pagetitle = 'Utilisateur à modifier';
                require (File::build_path(array('view', 'view.php')));
            }
            else {
                $view = 'connect';
                $pagetitle = 'Connexion';
                require (File::build_path(array('view', 'view.php')));
            }
        }
        else {
            $controller = 'utilisateur';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
        }
    }

    public static function updated() {
        if(isset($_GET['login']) && isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['mdp'])) {
            if ($_SESSION['login'] === $_GET['login'] || Session::is_admin()) {
                if($_GET['mdp'] === $_GET['vmdp']) {
                    $view = 'updated';
                    $pagetitle = 'Utilisateur modifié';
                    $mdpsecu = Security::chiffrer($_GET['mdp']);
                    $login = $_GET['login'];
                    $_GET['admin'] = '';
                    if ($_GET['admin'] == 0 || $_GET['admin'] == 1) {
                        $vadmin = 1;
                    }
                    else if($_GET['admin'] == '' || $_GET['admin'] == NULL) {
                        $vadmin = 0;
                    }
                    $data = array(
                        "login" => $_GET['login'],
                        "nom" => $_GET['nom'],
                        "prenom" => $_GET['prenom'],
                        "mdp" => $mdpsecu,
                        "admin" => $vadmin,
                        "email" => $_GET['email'],
                    );
                    $u = new ModelUtilisateur($_GET['login'], $_GET['nom'], $_GET['prenom'], $mdpsecu, $_GET['admin']);
                    $u->update($data);
                    $tab_u = ModelUtilisateur::selectAll();
                    require (File::build_path(array('view', 'view.php')));
                } else {
                    echo('Vos deux mots de passe ne sont pas identique !');
                }
            }
            else {
                $view = 'connect';
                $pagetitle = 'Connexion';
                require (File::build_path(array('view', 'view.php')));
            }

        }
        else {
            $controller = 'utilisateur';
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array('view', 'view.php')));
        }
    }

    */
}