<?php

require_once __DIR__. DIRECTORY_SEPARATOR. 'lib'. DIRECTORY_SEPARATOR. 'Session.php'; 
session_start();
require_once __DIR__ . DIRECTORY_SEPARATOR .'lib'. DIRECTORY_SEPARATOR .'File.php';
require_once (File::build_path(array('controller', 'routeur.php')));

?>