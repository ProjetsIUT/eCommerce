<?php
// require_once de chaque controller
$controller_default = 'produit';

if(isset($_COOKIE['preference'])) {
    $controller_default = unserialize($_COOKIE['preference']);
}

if (!isset($_GET['controller'])) {
    $controller = $controller_default;
}
else {
    $controller = $_GET['controller'];
}

?>
