<?php
    echo '<p> L\'utilisateur de login '.htmlspecialchars($_GET['loginUtilisateur']).' a été mis à jour!
    <br>
    Vous allez être redirigez vers la liste des utilisateurs.</p>
            <meta http-equiv="refresh" content="3; URL=index.php?action=readAll&controller=utilisateur" />';

?> 