<?php
    $ulogin = $u->get('login');
    $uprenom = $u->get('prenom');
    $unom = $u->get('nom');

    echo '<p>  Utilisateur '. $uprenom .' '. $unom .' de login '. $ulogin .' </p>';
    if (Session::is_user($ulogin) || Session::is_admin()) {
        echo ('<a href="index.php?controller=utilisateur&action=delete&login=' . rawurlencode($ulogin) . '"> <br> <p> Cliquez ici pour supprimer cette utilisateur ! </p> </a>');
        echo ('<a href="index.php?controller=utilisateur&action=update&login=' . $ulogin . '"> <br> <p> Cliquez ici pour modifier cette utilisateur ! </p> </a>');
    }
?>