<?php
class Conf {
    // la variable debug est un boolean
  static private $debug = True;  
  static private $databases = array(
    // Le nom d'hote est webinfo a l'IUT
    // ou localhost sur votre machine
    'hostname' => 'webinfo',
    // A l'IUT, vous avez une BDD nommee comme votre login
    // Sur votre machine, vous devrez creer une BDD
    'database' => 'bourdesj',

    // At IUT, it is your classical login
    // On your computer, you should have at least a 'root' account
    'login' => 'bourdesj',
    // At IUT, it is your database password 
    // (=PHPMyAdmin pwd, INE by defaut)
    // On your computer, you created the pwd during setup
    'password' => 'Unicorn'
  );
   
  static public function getLogin() {
    //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
    return self::$databases['login'];
  }
  
  static public function getHostname() {
    return self::$databases['hostname'];
  }

  static public function getDatabase() {
    return self::$databases['database'];
  }

  static public function getPassword() {
    return self::$databases['password'];
  }

  static public function getDebug() {
    return self::$debug;
  }
}
?>
