<?php

    echo '<p> L\'utilisateur de login '.$login.' a été mis à jour!</p>';

    foreach ($tab_u as $u) 
        echo ('<a href="index.php?action=read&controller=utilisateur&login=' . rawurlencode($u->get('login')) . '"> <p> Utilisateur de login ' . htmlspecialchars($u->get('login')) . '</p> </a>');

?> 