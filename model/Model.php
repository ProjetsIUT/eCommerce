<?php
    require_once (File::build_path(array('config','Conf.php')));
    class Model {

        public static $pdo;
        public static function Init() {
            $hostname = Conf::getHostname();
            $login = Conf::getLogin();
            $database_name = Conf::getDatabase();
            $password = Conf::getPassword();
            try{
                // Connexion à la base de données            
                // Le dernier argument sert à ce que toutes les chaines de caractères 
                // en entrée et sortie de MySql soit dans le codage UTF-8
                self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              } catch(PDOException $e) {
                    if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    echo 'Une erreur est survenue <a href="index.php"> retour a la page d\'accueil </a>';
                }
                die();
              }
            
        }

        public static function selectAll() {
            $table_name = 'ecommerce_'.static::$object;
            $name = static::$object;
            $class_name = 'Model' . ucfirst($name);
            $rep = Model::$pdo->query("SELECT * FROM $table_name");
            $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab_obj = $rep->fetchAll();
            /*echo "<ul>";
            foreach ($tab_obj as $keys => $value) { 
                echo "<li> Car $value->immatriculation of make $value->marque color $value->couleur </li>";
            }
            echo "</ul>";*/
            return $tab_obj;
        }

        public static function select($primary_value) {
            $table_name = 'ecommerce_'.static::$object;
            $name = static::$object;
            $class_name = 'Model' . ucfirst($name);
            $primary_key = static::$primary;
            $sql = "SELECT * from $table_name WHERE $primary_key=:val";

            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql); //permet de protéger la requete SQL
            
            $values = array(
                "val" => $primary_value,
            );

            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab_obj = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_obj))
                return false;
            return $tab_obj[0];
        }

        public static function delete($primary) {
            $table_name = 'ecommerce_'.static::$object;
            $name = static::$object;
            $class_name = 'Model' . ucfirst($name);
            $primary_key = static::$primary;
            $sql = "DELETE FROM $table_name WHERE $primary_key=:nom_tag";
            try {
              // Préparation de la requête
              $req_prep = Model::$pdo->prepare($sql); //permet de protéger la requete SQL
        
              $values = array(
                  "nom_tag" => $primary,
                  //nomdutag => valeur, ...
              );
              // On donne les valeurs et on exécute la requête	 
              $req_prep->execute($values);
            }
            catch(PDOException $e) {
              if (Conf::getDebug()) {
                  $view = 'error';
                  $pagetitle = 'Erreur';
                  require (File::build_path(array('view', 'view.php')));
              } else {
                echo ('Une erreur est survenue ! <br> <a href="index.php"> Retour a la page d\'accueil </a>');
              }
              die();
            } 
        
        }

        public static function update($data) {
            $table_name = 'ecommerce_'.static::$object;
            $name = static::$object;
            $class_name = 'Model' . ucfirst($name);
            $primary_key = static::$primary;
            $set = "";
            $values = array();

            foreach ($data as $cle => $valeur) {
                if (strcmp($cle, $primary_key) != 0) {
                    $lastkey = end($data);
                    if (strcmp($data[''.$cle.''], $lastkey) == 0) {
                        $set = $set.$cle."=:".$cle." ";
                        $new_value = array($cle => $valeur,);
                        $values = array_merge($values, $new_value);
                    } 
                    else {
                        $set = $set.$cle."=:".$cle." , ";
                        $new_value = array($cle => $valeur,);
                        $values = array_merge($values, $new_value);
                    }
                }
                else {
                    $new_value = array($cle => $valeur,);
                    $values = array_merge($values, $new_value);
                } 
            } 

            $primary_value = ":".$primary_key;

            $sql = "UPDATE $table_name SET $set WHERE $primary_key =$primary_value";
            //try {
              $req_prep = Model::$pdo->prepare($sql);
          
              $req_prep->execute($values);
            /*}
            catch(PDOException $e) {
              if (Conf::getDebug()) {
                  $error_code = 'Model : save, error';
                  $view = 'error';
                  $pagetitle = 'Erreur';
                  require (File::build_path(array('view', 'error.php')));
              } else {
                echo ('Une erreur est survenue. Impossible de modifier la base de données ! <br> <a href="index.php"> Retour a la page d\'accueil </a>');
              }
              die();
            } */
        
          }

          public static function save($data) {
            $table_name = 'ecommerce_'.static::$object;
            $name = static::$object;
            $class_name = 'Model' . ucfirst($name);
            $primary_key = static::$primary;
            $attributs = "";
            $variables = "";
            $values = array();

            foreach ($data as $cle => $valeur) {

                    $lastkey = end($data);
                    if (strcmp($data[''.$cle.''], $lastkey) == 0) {
                        $attributs = $attributs."".$cle."";
                        $variables = $variables.":".$cle."";
                        $new_value = array($cle => $valeur,);
                        $values = array_merge($values, $new_value);
                    } 
                    else {
                        $attributs = $attributs."".$cle.", ";
                        $variables = $variables.":".$cle.", ";
                        $new_value = array($cle => $valeur,);
                        $values = array_merge($values, $new_value);
                    }
            }

            $sql = "INSERT INTO $table_name ($attributs) VALUES ($variables)";

            // Préparation de la requête
            //try {
            $req_prep = Model::$pdo->prepare($sql); //permet de protéger la requete SQL
        
            $req_prep->execute($values);
            /*}
              catch(PDOException $e) {
                if (Conf::getDebug()) {
                    $view = 'error';
                    $pagetitle = 'Erreur';
                    require (File::build_path(array('view', 'view.php')));
                  //echo 'Cette voiture existe déja dans la BD de notre site ! <br> <a href="?action=readAll"> retour a la page d\'accueil </a>'; affiche un message d'erreur
              } else {
                  echo 'Une erreur est survenue dans la base de données ! <br> <a href="index.php"> Retour a la page d\'accueil </a>';
              }
              die();
            } */
          }

    }
    Model::Init();
?>