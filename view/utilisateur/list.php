<?php
    foreach ($tab_u as $u) 
        $codeU = $u->get('codeUtilisateur');
        $loginU = $u->get('loginUtilisateur');
        echo ('<p> <a href="index.php?controller=utilisateur&action=read&codeUtilisateur='.rawurlencode($codeU).'" style="color:black"> L\'utilisateur de login '.htmlspecialchars($loginU).' </a> </p>');
    
?>
<a href="index.php?controller=utilisateur&action=create" style="color:black" > Cliquez ici pour créer un nouvel utilisateur ! </a>