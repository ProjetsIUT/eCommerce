<?php
    foreach ($tab_u as $u) 
        echo ('<p> <a href="index.php?controller=utilisateur&action=read&loginUtilisateur='.rawurlencode($u->get('loginUtilisateur')).'" style="color:black"> L\'utilisateur de login '.htmlspecialchars($u->get('loginUtilisateur')).' </a> </p>');
    
?>
<a href="index.php?controller=utilisateur&action=create" style="color:black" > Cliquez ici pour créer un nouvel utilisateur ! </a>