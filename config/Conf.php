<?php
class Conf {

  
   
  static private $databases = array(
    // Hostname is webinfo at IUT
    // or localhost on your computer
    'hostname' => 'localhost',
    // At IUT, you have a database named after your login
    // On your computer, please create a database
    'database' => 'bourdesj',
    // At IUT, it is your classical login
    // On your computer, you should have at least a 'root' account
    'login' => 'root',
    // At IUT, it is your database password 
    // (=PHPMyAdmin pwd, INE by defaut)
    // On your computer, you created the pwd during setup
    'password' => 'julian'
  );

  static private $debug = True;

  static public function getDebug(){

    return self::$debug;

  }
   
  static public function getLogin() {
    //in PHP, indices of arrays car be strings (or integers)
    return self::$databases['login'];
  }

  static public function getDatabase(){

  	return self::$databases['database'];

  }

  static public function getHostname(){

  	return self::$databases['hostname'];

  }

  static public function getPassword(){

 	return self::$databases['password'];

  }

   
}
?>

